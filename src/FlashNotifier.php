<?php

namespace Tshafer\Flash;

use Illuminate\Session\Store;

class FlashNotifier
{

    /**
     * The session writer.
     *
     * @var Store
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a success message.
     *
     * @param string $message
     * @param string $title
     *
     * @return $this
     */
    public function success($message, $title = null)
    {
        return $this->message($message, 'success', $title);
    }

    /**
     * Flash an information message.
     *
     * @param string $message
     * @param string $title
     *
     * @return $this
     */
    public function info($message, $title = null)
    {
        return $this->message($message, 'info', $title);
    }

    /**
     * Flash a warning message.
     *
     * @param string $message
     * @param string $title
     *
     * @return $this
     */
    public function warning($message, $title = null)
    {
        return $this->message($message, 'warning', $title);
    }

    /**
     * Flash an error message.
     *
     * @param string $message
     * @param string $title
     *
     * @return $this
     */
    public function error($message, $title = null)
    {
        return $this->message($message, 'danger', $title);
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

    /**
     * Flash an overlay modal.
     *
     * @param string $message
     * @param string $title
     *
     * @return $this
     */
    public function overlay($message, $title = 'Notice')
    {
        return $this->message($message, 'info', $title, true);
    }

    /**
     * Flash a general message.
     *
     * @param string $message
     * @param string $level
     * @param bool   $overlay
     *
     * @return $this
     */
    public function message($message, $level = 'info', $title = 'Notice', $overlay = false)
    {
        $this->session->flash('flash_notification.messages', [
          compact('message', 'level', 'title', 'overlay'),
        ]);

        return $this;
    }
}
