#!/bin/sh
cd ~/repos/PDF-downloader/ && docker run -v "$(pwd)"/download:/download pdfdownload
