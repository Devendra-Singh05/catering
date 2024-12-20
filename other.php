<?php
// File upload ke liye maximum size limit (1MB)
$maxSize = 1 * 1024 * 1024; // 1MB

// File upload directory
$targetDirectory = "uploads/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // File ko access karna
    $file = $_FILES['fileToUpload'];
    $fileTmpName = $file['tmp_name'];
    $fileName = $file['name'];
    $fileSize = $file['size'];

    // Check if file size is greater than 1MB
    if ($fileSize > $maxSize) {
        // Agar size 1MB se zyada hai, to compress karna hoga
        $imageInfo = getimagesize($fileTmpName);
        $imageType = $imageInfo[2];

        // File ko compress karna
        if ($imageType == IMAGETYPE_JPEG) {
            // JPEG image ko compress karna
            $image = imagecreatefromjpeg($fileTmpName);
            $newFileName = $targetDirectory . "compressed_" . $fileName;
            imagejpeg($image, $newFileName, 75); // 75 quality for compression
            imagedestroy($image);
        } elseif ($imageType == IMAGETYPE_PNG) {
            // PNG image ko compress karna
            $image = imagecreatefrompng($fileTmpName);
            $newFileName = $targetDirectory . "compressed_" . $fileName;
            imagepng($image, $newFileName, 6); // Compression level (0 to 9)
            imagedestroy($image);
        } else {
            // Agar image format supported nahi hai
            echo "Unsupported file format.";
            exit;
        }

        // Compress hone ke baad file ko move karna
        $fileSizeAfterCompression = filesize($newFileName);

        // Agar compressed file ka size 1MB se kam hai to final move kar do
        if ($fileSizeAfterCompression <= $maxSize) {
            echo "File successfully uploaded and compressed.";
        } else {
            echo "Compressed file is still too large.";
        }
    } else {
        // Agar file size 1MB se kam hai, to directly upload
        $targetFile = $targetDirectory . basename($fileName);
        if (move_uploaded_file($fileTmpName, $targetFile)) {
            echo "File successfully uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>
