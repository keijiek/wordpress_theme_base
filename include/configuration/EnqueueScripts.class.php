<?php

namespace configuration;

class EnqueueScripts
{
  private array $cssFiles = [];
  private array $jsFiles = [];

  public function __construct() {}

  public function addCss(string $handle, string $filePath, array $depends = []): void
  {
    $this->cssFiles[] = (new CssFile($handle, $filePath, $depends));
  }

  public function addJs(string $handle, string $filePath, array $depends = [], array $args = [], bool $isEcmaScript = false): void
  {
    $this->jsFiles[] = (new JsFile($handle, $filePath, $depends, $args, $isEcmaScript));
  }

  public function excute(): void
  {
    add_action('wp_enqueue_scripts', [$this, 'enqueueScripts']);
  }

  public function enqueueScripts(): void
  {
    foreach ($this->cssFiles as $cssFile) {
      wp_enqueue_style(
        $cssFile->handle,
        get_template_directory_uri() . $cssFile->filePath,
        $cssFile->depends,
        filemtime(get_theme_file_path($cssFile->filePath)),
      );
    }
    foreach ($this->jsFiles as $jsFile) {
      wp_enqueue_script(
        $jsFile->handle,
        get_template_directory_uri() . $jsFile->filePath,
        $jsFile->depends,
        filemtime(get_theme_file_path($jsFile->filePath)),
      );
    }
  }
}

class CssFile
{
  public string $handle;
  public string $filePath;
  public array $depends;
  public string|false $var;
  public string $media;

  public function __construct(string $handle, string $filePath, array $depends = [], string $media = 'all')
  {
    $this->handle = $handle;
    $this->filePath = $filePath;
    $this->depends = $depends;
    $this->var = $this->getVar();
    $this->media = $media;
  }

  private function getVar(): int|false
  {
    if (strncmp($this->filePath, 'http', 4) === 0) {
      return false;
    }
    return filemtime(get_theme_file_path($this->filePath));
  }
}

class JsFile
{
  public string $handle;
  public string $filePath;
  public array $depends;
  public array $args;
  public bool $isEcmaScript;

  public function __construct(string $handle, string $filePath, array $depends = [], array $args = [], bool $isEcmaScript = false)
  {
    $this->handle = $handle;
    $this->filePath = $filePath;
    $this->depends = $depends;
    $this->args = $args;
    $this->isEcmaScript = $isEcmaScript;
  }
}
