<?php

use PHPUnit\Framework\TestCase;

class ImageExistenceTest extends TestCase
{
    public function testImageExists()
    {
        $imagePath = __DIR__ . '/images/beauty_salon.jpg'; // Replace __DIR__ with the actual path

        // Check if the image file exists
        $this->assertFileExists($imagePath);

        // Output a message indicating the success
        echo "Image exists at: $imagePath\n";
    }
}