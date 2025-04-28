<?php
$role = session('role');
?>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg px-3" style="background: linear-gradient(135deg, rgb(20, 31, 182) 0%, #2575fc 100%);">
    <a class="navbar-brand text-white" href="#"><strong>Sagara Mart</strong> </a>
    <div class="ms-auto">
        <span class="text-white me-3"><?= esc(session('username')) ?> (<?= esc($role) ?>)</span>
        <a href="/logout" class="btn btn-sm btn-outline-light">Logout</a>
    </div>
</nav>

<!-- SIDEBAR -->
<div class="p-3 border-end" style="min-height: 10vh; background: linear-gradient(135deg, #2575fc 0%,rgb(20, 31, 182) 100%);">
    <ul class="nav flex-column">
        <?php if ($role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/produk">Manajemen Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/home/produk">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/home/keranjang">Keranjang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/admin/monitoring">Monitoring User</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="/user">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/home/produk">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="/home/keranjang">Keranjang</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
