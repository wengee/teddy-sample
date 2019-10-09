<?php declare(strict_types=1);
/**
 * @author   Fung Wing Kit <wengee@gmail.com>
 * @version  2019-10-09 11:48:12 +0800
 */

namespace App\Providers;

use Exception;
use RuntimeException;
use Throwable;

class Renderer
{
    protected $templateDir = '';

    protected $files = [];

    protected $attributes = [];

    public function __construct()
    {
        $this->templateDir = config('template.dir', BASE_PATH . 'templates');
    }

    public function render(string $filePath, array $data = []): string
    {
        try {
            $output = $this->fetch($filePath, $data);
        } catch (Exception $e) {
            $output = '';
        }

        return $output ?: '';
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $attributes): void
    {
        $this->attributes = $attributes;
    }

    public function addAttribute(string $key, $value): void
    {
        $this->attributes[$key] = $value;
    }

    public function getAttribute(string $key)
    {
        return isset($this->attributes[$key]) ? $this->attributes[$key] : false;
    }

    protected function fetch(string $path, array $data = [])
    {
        $templateFile = $this->getTemplateFile($path);
        if (!$templateFile) {
            throw new RuntimeException("View cannot render `$path` because the template does not exist");
        }

        $data = array_merge($this->attributes, $data);
        try {
            ob_start();
            $this->protectedIncludeScope($templateFile, $data);
            $output = ob_get_clean();
        } catch (Throwable $e) {
            ob_end_clean();
            throw $e;
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        return $output;
    }

    protected function protectedIncludeScope(string $template, array $data): void
    {
        foreach ($data as $key => $value) {
            is_string($key) && ($$key = $value);
        }

        include $template;
    }

    protected function getTemplateFile(string $path)
    {
        if (isset($this->files[$path])) {
            return $this->files[$path];
        }

        $templateFile = path_join($this->templateDir, $path);
        if (substr($templateFile, -4) !== '.php') {
            $templateFile .= '.php';
        }

        if (!is_file($templateFile)) {
            $templateFile = false;
        }

        $this->files[$path] = $templateFile;
        return $templateFile;
    }
}
