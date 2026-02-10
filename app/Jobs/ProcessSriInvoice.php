<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Facturas;
use App\Services\Sri\SriService;

class ProcessSriInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $factura;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Facturas $factura)
    {
        $this->factura = $factura;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SriService $sriService)
    {
        // Ensure relationships are loaded
        $this->factura->load('cliente', 'detalles.producto');
        $sriService->procesarFactura($this->factura);
    }
}
