<?php
/**
 * Representation of an uploaded file instance
 */
class UploadedFile {
    protected string $originalName;
    protected string $mimeType;
    protected string $path;

    /**
     * @param string $path Temporary path of the uploaded file
     * @param string $originalName Original name of the file
     * @param string $mimeType MIME type of the file
     */
    function __construct($path, $originalName, $mimeType)
    {
        $this->path = $path;
        $this->originalName = $originalName;
        $this->mimeType = $mimeType;
    }

    static function emptyFile()
    {
        return new self("", "", "");
    }

    function store($directory, $fileName = null) {
        if (!$this->originalName || !$this->mimeType) return false;

        $fileName = $fileName ?? $this->originalName;
        $uploaded = move_uploaded_file($this->path, $directory . DIRECTORY_SEPARATOR . $fileName);

        if (!$uploaded) return false;
        return $directory . DIRECTORY_SEPARATOR . $fileName;
    }
}