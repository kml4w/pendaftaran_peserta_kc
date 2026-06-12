<?php
// home.php (TIDAK PERLU session_start karena sudah di index.php)
?>

<style>
    body {
        background: #f8fafc;
    }

    .hero {
        padding: 90px 20px;
        background: linear-gradient(135deg, #353739, #3d3e47);
        color: white;
        border-radius: 18px;
        text-align: center;
    }

    .hero h1 {
        font-size: 44px;
        font-weight: 800;
    }

    .hero p {
        font-size: 18px;
        opacity: 0.9;
        max-width: 700px;
        margin: auto;
    }

    .btn-cta {
        margin-top: 25px;
        padding: 12px 25px;
        font-size: 18px;
        border-radius: 10px;
    }

    .section-title {
        font-weight: 800;
        margin: 60px 0 20px;
        text-align: center;
    }

    .card-course {
        border: none;
        border-radius: 14px;
        transition: 0.3s;
    }

    .card-course:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    .stats {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-top: 50px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .stat-box {
        text-align: center;
    }

    .stat-box h2 {
        font-weight: 800;
        color: #2563eb;
    }

    .value-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
    }
</style>

<div class="container mt-4">

    <!-- HERO -->
    <div class="hero">
        <h1>Belajar Coding & Jadi Developer Siap Kerja</h1>
        <p>
            Kafe Koding adalah bootcamp modern untuk belajar PHP, JavaScript, Database, HTML, CSS, dan Laravel 
            dengan metode project-based seperti industri teknologi.
        </p>

        <!-- FIX LINK -->
        <a href="index.php?page=create" class="btn btn-light btn-lg btn-cta">
            Mulai Belajar Sekarang
        </a>
    </div>

    <!-- VALUE -->
    <h3 class="section-title">Kenapa Kafe Koding?</h3>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="value-card">
                <h5>🔥 Project Based Learning</h5>
                <p>Belajar langsung dengan studi kasus seperti dunia kerja.</p>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="value-card">
                <h5>🚀 Skill Siap Industri</h5>
                <p>Materi sesuai kebutuhan perusahaan teknologi.</p>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="value-card">
                <h5>📈 Dari Basic ke Advance</h5>
                <p>Cocok untuk pemula sampai siap kerja developer.</p>
            </div>
        </div>

    </div>

    <!-- COURSES -->
    <h3 class="section-title">Program Kelas</h3>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card card-course shadow-sm">
                <div class="card-body text-center">
                    <h5>PHP Backend</h5>
                    <p>Membuat sistem CRUD & aplikasi web</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-course shadow-sm">
                <div class="card-body text-center">
                    <h5>JavaScript</h5>
                    <p>Interaksi UI & logika frontend modern</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card card-course shadow-sm">
                <div class="card-body text-center">
                    <h5>HTML & CSS</h5>
                    <p>Desain web responsif & menarik</p>
                     
                </div>
            </div>
        </div>
         <div class="col-md-4 mb-4">
            <div class="card card-course shadow-sm">
                <div class="card-body text-center">
                    <h5>Database</h5>
                    <p>Manajemen data & query SQL</p>
                    
                </div>
            </div>
        </div>

        
            <div class="col-md-4 mb-4">
                <div class="card card-course shadow-sm">
                    <div class="card-body text-center">
                        <h5>Laravel </h5>
                        <p>Framework PHP untuk pengembangan web</p>

                    </div>
                </div>

    </div>

   

    <!-- FINAL CTA -->
    <div class="text-center mt-5 mb-5">
        <h3>Siap Jadi Developer Profesional?</h3>
        <p>Gabung sekarang dan mulai perjalanan karirmu </p>

        <!-- FIX LINK -->
        <a href="index.php?page=create"  class="btn btn-primary btn-lg btn-cta">
            Daftar Sekarang
        </a>
    </div>

</div>