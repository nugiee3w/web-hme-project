#!/bin/bash

echo "🐳 Railway Dockerfile Selector"
echo "==============================="
echo ""
echo "Pilih Dockerfile untuk deployment:"
echo "1. Dockerfile (Standard - Recommended)"
echo "2. Dockerfile.simple (Simple single-stage)"
echo "3. Dockerfile.minimal (Minimal dengan pre-built image)"
echo "4. Dockerfile.debug (Debug version)"
echo ""

read -p "Masukkan pilihan (1-4): " choice

case $choice in
    1)
        echo "✅ Menggunakan Dockerfile standard"
        # Dockerfile sudah ada sebagai default
        ;;
    2)
        echo "✅ Switching to Dockerfile.simple"
        mv Dockerfile Dockerfile.backup
        cp Dockerfile.simple Dockerfile
        ;;
    3)
        echo "✅ Switching to Dockerfile.minimal"
        mv Dockerfile Dockerfile.backup
        cp Dockerfile.minimal Dockerfile
        ;;
    4)
        echo "✅ Switching to Dockerfile.debug"
        mv Dockerfile Dockerfile.backup
        cp Dockerfile.debug Dockerfile
        ;;
    *)
        echo "❌ Pilihan tidak valid"
        exit 1
        ;;
esac

echo ""
echo "📋 Docker Build Test (Optional):"
echo "Jalankan command berikut untuk test build lokal:"
echo "docker build -t test-railway ."
echo "docker run -p 8080:80 test-railway"
echo ""
echo "🚀 Siap untuk Railway deployment!"
echo "Jangan lupa push ke GitHub setelah ini."
