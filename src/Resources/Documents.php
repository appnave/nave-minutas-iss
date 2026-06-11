<?php

namespace Bildvitta\IssJuridico\Resources;

use Bildvitta\IssJuridico\IssJuridico;

class Documents
{
    private IssJuridico $juridico;


    public function __construct(IssJuridico $juridico)
    {
        $this->juridico = $juridico;
    }

    public function list($data)
    {
        return $this->juridico->request->get(
            '/documents',
            $data
        )->object();
    }

    public function send($data)
    {
        return $this->juridico->request->post(
            '/documents/send',
            $data
        )->object();
    }

    public function file($data)
    {
        return $this->juridico->request->get(
            '/documents/file',
            $data
        )->object();
    }

    public function historic($data)
    {
        return $this->juridico->request->get(
            sprintf('/documents/historic'),
            $data
        )->object();
    }

    public function historicDocument($uuidDocument, $data)
    {
        return $this->juridico->request->get(
            sprintf('/documents/%s/historic', $uuidDocument),
            $data
        )->object();
    }

    public function fileDocument($uuidDocument, $data)
    {
        return $this->juridico->request->get(
            sprintf('/documents/%s/file', $uuidDocument),
            $data
        )->object();
    }

    public function download($uuidDocument)
    {
        return $this->juridico->request->get(
            sprintf('/documents/%s/download', $uuidDocument),
        )->object();
    }

    public function verifySignatures($uuidDocument)
    {
        return $this->juridico->request->get(
            sprintf('/documents/%s/verify-signatures', $uuidDocument),
        )->object();
    }

    public function cancel($uuidDocument, $data)
    {
        return $this->juridico->request->put(
            sprintf('/documents/%s/cancel', $uuidDocument),
            $data
        )->object();
    }

    public function resendSigner($uuidDocument, $uuidSigner)
    {
        return $this->juridico->request->get(
            sprintf('/documents/%s/resend-signer/%s', $uuidDocument, $uuidSigner)
        )->object();
    }

    public function changeSigner($uuidDocument, $uuidSigner, $data)
    {
        return $this->juridico->request->put(
            sprintf('/documents/%s/change-signer/%s', $uuidDocument, $uuidSigner),
            $data
        )->object();
    }

    public function select($data)
    {
        return $this->juridico->request->get(
            '/templates/select',
            $data
        )->object();
    }

    public function editSigner($uuidDocument, $uuidSigner)
    {
        return $this->juridico->request->get(
            sprintf('/documents/%s/change-signer/%s/edit', $uuidDocument, $uuidSigner)
        )->object();
    }

}
