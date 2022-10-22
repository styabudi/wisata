<?php
class Flasher
{
    public static function setFlash($message, $action, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible" role="alert">
                <div>' . $_SESSION['flash']['message'] . '</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

            unset($_SESSION['flash']);
        }
    }
}
