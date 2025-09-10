<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class InstagramController extends Controller
{
    /**
     * Get Instagram posts using Basic Display API
     */
    public function getPosts()
    {
        try {
            // Check if Instagram API is configured
            $accessToken = config('services.instagram.access_token');
            
            if (!$accessToken || $accessToken === 'your_instagram_access_token_here') {
                // Return demo data for development
                return response()->json([
                    'success' => false,
                    'message' => 'Instagram API not configured. Using demo data.',
                    'demo' => true,
                    'data' => $this->getDemoData()
                ]);
            }

            // Cache posts for 10 minutes to avoid API rate limits
            $posts = Cache::remember('instagram_posts', 600, function () {
                return $this->fetchInstagramPosts();
            });

            return response()->json([
                'success' => true,
                'data' => $posts
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch Instagram posts',
                'error' => $e->getMessage(),
                'demo' => true,
                'data' => $this->getDemoData()
            ], 200); // Return 200 with demo data instead of 500
        }
    }

    /**
     * Fetch posts from Instagram Basic Display API
     */
    private function fetchInstagramPosts()
    {
        $accessToken = config('services.instagram.access_token');
        
        if (!$accessToken) {
            throw new \Exception('Instagram access token not configured');
        }

        $response = Http::get('https://graph.instagram.com/me/media', [
            'fields' => 'id,caption,media_type,media_url,thumbnail_url,permalink,timestamp,like_count,comments_count',
            'access_token' => $accessToken,
            'limit' => 6 // Ambil 6 post terbaru
        ]);

        if (!$response->successful()) {
            throw new \Exception('Instagram API request failed: ' . $response->body());
        }

        $data = $response->json();
        
        if (!isset($data['data'])) {
            throw new \Exception('Invalid Instagram API response');
        }

        return $this->formatInstagramPosts($data['data']);
    }

    /**
     * Format Instagram posts for frontend display
     */
    private function formatInstagramPosts($posts)
    {
        return array_map(function ($post) {
            return [
                'id' => $post['id'],
                'caption' => $this->truncateCaption($post['caption'] ?? ''),
                'media_type' => $post['media_type'],
                'media_url' => $post['media_url'],
                'thumbnail_url' => $post['thumbnail_url'] ?? $post['media_url'],
                'permalink' => $post['permalink'],
                'timestamp' => $post['timestamp'],
                'formatted_date' => $this->formatDate($post['timestamp']),
                'like_count' => $post['like_count'] ?? 0,
                'comments_count' => $post['comments_count'] ?? 0,
            ];
        }, $posts);
    }

    /**
     * Truncate caption for display
     */
    private function truncateCaption($caption, $length = 150)
    {
        if (strlen($caption) <= $length) {
            return $caption;
        }

        return substr($caption, 0, $length) . '...';
    }

    /**
     * Format timestamp to readable date
     */
    private function formatDate($timestamp)
    {
        return \Carbon\Carbon::parse($timestamp)->locale('id')->diffForHumans();
    }

    /**
     * Refresh Instagram access token (long-lived tokens)
     */
    public function refreshToken()
    {
        try {
            $accessToken = config('services.instagram.access_token');
            
            $response = Http::get('https://graph.instagram.com/refresh_access_token', [
                'grant_type' => 'ig_refresh_token',
                'access_token' => $accessToken
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                // Update token in environment (requires manual env update)
                return response()->json([
                    'success' => true,
                    'new_token' => $data['access_token'],
                    'expires_in' => $data['expires_in']
                ]);
            }

            throw new \Exception('Token refresh failed');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to refresh token',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get Instagram profile info
     */
    public function getProfile()
    {
        try {
            $accessToken = config('services.instagram.access_token');
            
            $response = Http::get('https://graph.instagram.com/me', [
                'fields' => 'id,username,account_type,media_count',
                'access_token' => $accessToken
            ]);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'data' => $response->json()
                ]);
            }

            throw new \Exception('Profile fetch failed');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch profile',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get demo data for development/testing
     */
    private function getDemoData()
    {
        return [
            [
                'id' => 'demo_1',
                'media_type' => 'IMAGE',
                'media_url' => 'https://picsum.photos/400/400?random=1',
                'caption' => '🎓 Kegiatan Workshop IoT bersama mahasiswa Teknik Elektro! Belajar tentang teknologi Internet of Things yang semakin berkembang pesat. #HMEPoliban #IoT #TeknikElektro #Workshop',
                'timestamp' => '2025-09-06T10:30:00Z',
                'like_count' => 45,
                'comments_count' => 8,
                'permalink' => 'https://instagram.com/p/demo1'
            ],
            [
                'id' => 'demo_2',
                'media_type' => 'IMAGE',
                'media_url' => 'https://picsum.photos/400/400?random=2',
                'caption' => '⚡ Seminar Nasional Teknologi Listrik 2025! Menghadirkan pembicara ahli dari berbagai universitas terkemuka. Jangan sampai terlewat! #SeminarNasional #TeknikListrik #HME',
                'timestamp' => '2025-09-05T14:20:00Z',
                'like_count' => 67,
                'comments_count' => 12,
                'permalink' => 'https://instagram.com/p/demo2'
            ],
            [
                'id' => 'demo_3',
                'media_type' => 'IMAGE',
                'media_url' => 'https://picsum.photos/400/400?random=3',
                'caption' => '🔬 Praktikum Laboratorium Elektronika berjalan dengan lancar! Mahasiswa antusias belajar tentang rangkaian elektronik dasar. #PraktikumElektronika #LaboratoriumElektro #BelajarElektronika',
                'timestamp' => '2025-09-04T09:15:00Z',
                'like_count' => 38,
                'comments_count' => 5,
                'permalink' => 'https://instagram.com/p/demo3'
            ],
            [
                'id' => 'demo_4',
                'media_type' => 'VIDEO',
                'media_url' => 'https://picsum.photos/400/400?random=4',
                'caption' => '🎯 Kegiatan Organisasi HME hari ini! Rapat koordinasi untuk persiapan acara besar bulan depan. Semangat terus untuk kemajuan organisasi! #RapatKoordinasi #OrganisasiMahasiswa',
                'timestamp' => '2025-09-03T16:45:00Z',
                'like_count' => 52,
                'comments_count' => 9,
                'permalink' => 'https://instagram.com/p/demo4'
            ],
            [
                'id' => 'demo_5',
                'media_type' => 'IMAGE',
                'media_url' => 'https://picsum.photos/400/400?random=5',
                'caption' => '📚 Sharing Session tentang Renewable Energy! Diskusi menarik tentang energi terbarukan dan implementasinya di Indonesia. #RenewableEnergy #EnergiTerbarukan #SharingSession',
                'timestamp' => '2025-09-02T11:30:00Z',
                'like_count' => 73,
                'comments_count' => 15,
                'permalink' => 'https://instagram.com/p/demo5'
            ],
            [
                'id' => 'demo_6',
                'media_type' => 'IMAGE',
                'media_url' => 'https://picsum.photos/400/400?random=6',
                'caption' => '🏆 Prestasi mahasiswa HME di Kompetisi Robotika Nasional! Berhasil meraih juara 2 kategori Line Follower. Bangga dengan pencapaian ini! #PrestasiMahasiswa #RobotikaNasional #Juara',
                'timestamp' => '2025-09-01T13:20:00Z',
                'like_count' => 89,
                'comments_count' => 22,
                'permalink' => 'https://instagram.com/p/demo6'
            ]
        ];
    }
}
