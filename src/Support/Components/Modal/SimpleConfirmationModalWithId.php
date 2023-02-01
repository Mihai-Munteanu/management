<?php

namespace Support\Components\Modal;

use LivewireUI\Modal\ModalComponent;

class SimpleConfirmationModalWithId extends ModalComponent
{
    public $itemId;
    public string $title;
    public string $body;

    public function render()
    {
        return view('livewire.components.modal.simple-confirmation-modal-with-id');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function confirm()
    {
        $this->emit('confirmModal', $this->itemId);
        $this->closeModal();
    }

    public function cancel()
    {
        $this->emit('cancelModal');
        $this->closeModal();
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
