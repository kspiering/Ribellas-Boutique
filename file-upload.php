<?php

// File upload

class FileUpload {
    private $targetDirectory;
    private $maxFileSize;
    private $allowedMimeTypes;

    public function __construct($targetDirectory = 'uploads', $maxFileSize = 2097152, $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif']) {
        $this->targetDirectory = $targetDirectory;
        $this->maxFileSize = $maxFileSize;
        $this->allowedMimeTypes = $allowedMimeTypes;
    }

    public function validateAltText($altText) {
        return !empty($altText) && strlen($altText) <= 255;
    }

    public function validateFileType($fileType) {
        return in_array($fileType, $this->allowedMimeTypes);
    }

    public function validateFileSize($fileSize) {
        return $fileSize <= $this->maxFileSize;
    }

    public function createDateCodedPath() {
        $datePath = date('Y/m/d');
        $fullPath = $this->targetDirectory . '/' . $datePath;
        if (!is_dir($fullPath)) {
            mkdir($fullPath, 0777, true);
        }
        return $fullPath;
    }

    public function generateUniqueFileName($fileName) {
        $fileInfo = pathinfo($fileName);
        $baseName = $fileInfo['filename'];
        $extension = $fileInfo['extension'];
        $uniqueName = $baseName . '_' . uniqid() . '.' . $extension;
        return $uniqueName;
    }

    public function uploadFile($file, $altText) {
        if (!$this->validateAltText($altText)) {
            return ['success' => false, 'message' => 'Invalid alt text.'];
        }
        if (!$this->validateFileType($file['type'])) {
            return ['success' => false, 'message' => 'Invalid file type: ' . $file['type']];
        }
        if (!$this->validateFileSize($file['size'])) {
            return ['success' => false, 'message' => 'File size exceeds the limit.'];
        }

        $targetPath = $this->createDateCodedPath();
        $uniqueFileName = $this->generateUniqueFileName($file['name']);
        $destination = $targetPath . '/' . $uniqueFileName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return [
                'success' => true,
                'path' => $destination,
                'alt' => $altText
            ];
        } else {
            return [
                'success' => false,
                'message' => 'File upload failed.'
            ];
        }
    }
}