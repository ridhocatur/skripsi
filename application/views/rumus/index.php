<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Rumus Volume / Kubik Kayu Log</h6>
            </div>
            <div class="card-body">
                <p>
                    <h5>M<sup>3</sup> = P x L x 1/4&pi;</h5>
                </p>
                <p>
                    Keterangan : <br>
                    P = Panjang <br>
                    L = Lebar <br>
                    1/4&pi; = 0.7854
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Rumus Perhitungan Pada Pengupasan Kayu Log (Vinir)</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <h5>Kubik per Log</h5>
                            <b> K = V / S </b>
                        </p>
                        <p>
                            Keterangan : <br>
                            K = Jumlah Vol. per Log (M<sup>3</sup>)<br>
                            V = Total Vol. Kayu Log (M<sup>3</sup>)<br>
                            S = Total Stok Kayu Log (pcs)
                        </p>
                        <hr>
                        <p>
                            <h5>Jumlah Log Terpakai (pcs)</h5>
                            <b>LT = VK / K</b>
                        </p>
                        <p>
                            Keterangan : <br>
                            LT = Jumlah Log Terpakai (pcs)<br>
                            VK = Vol. Kayu Log yang digunakan (M<sup>3</sup>)<br>
                            K = Jumlah Vol. per Log (M<sup>3</sup>)
                        </p>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <h5>Volume Reeling</h5>
                            <b>VR = ((r + r + ØB)<sup>2</sup> x 1/4&pi; x P) - (VB x R)</b>
                        </p>
                        <p>
                            Keterangan : <br>
                            VR = Volume Reeling (M<sup>3</sup>)<br>
                            r = Jari-jari Reeling<br>
                            ØB = Diameter Bobin (M)<br>
                            1/4&pi; = 0.7854<br>
                            P = Panjang Vinir (M)<br>
                            VB = Volume Bobin (M<sup>3</sup>)<br>
                            R = Kerapatan (%)
                        </p>
                        <hr>
                        <p>
                            <h5>Jumlah Vinir dalam Reeling</h5>
                            <b> V = (p x l x t)/1.000.000.000</b> <br>
                            <b> PR = VR / V </b>
                        </p>
                        <p>
                            Keterangan : <br>
                            PR = Jml. Vinir (pcs)<br>
                            VR = Volume Reeling (M<sup>3</sup>)<br>
                            V = Volume Vinir per Lembar (M<sup>3</sup>)<br>
                            p = Panjang Vinir (mm) <br>
                            l = Lebar Vinir (mm) <br>
                            t = Tebal Vinir (mm) <br>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>