    @extends('layouts.admin')
    @section('content')

    <h3 class="mb-4">Dashboard</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow border-0 text-center p-4 stat-card">
                <h6 class="text-muted text-uppercase">Toplam Ürün</h6>
                <h2 class="text-primary fw-bold">{{ $productCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 text-center p-4 stat-card">
                <h6 class="text-muted text-uppercase">Toplam Kullanıcı</h6>
                <h2 class="text-success fw-bold">{{ $userCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 text-center p-4 stat-card">
                <h6 class="text-muted text-uppercase">Düşük Stok</h6>
                <h2 class="text-danger fw-bold">{{ $lowStock }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow border-0 text-center p-4 stat-card">
                <h6 class="text-muted text-uppercase">Toplam Ciro</h6>
                <h2 class="text-warning fw-bold">
                    {{ number_format($totalRevenue, 2) }} ₺
                </h2>
            </div>
        </div>

    </div>

    <div class="card shadow border-0 mt-5 p-4">
        <h5 class="mb-3">Hızlı İşlemler</h5>

        <div class="d-flex gap-3">
            <a href="/products/create" class="btn btn-success">
                Yeni Ürün Ekle
            </a>

            <a href="/products" class="btn btn-secondary">
                Ürün Listesi
            </a>
        </div>
    </div>
    <div class="card shadow border-0 mt-5 p-4">
        <h5 class="mb-4">Sistem İstatistikleri</h5>
        <canvas id="statsChart"></canvas>
    </div>

    @if($topCustomer)
    <div class="col-md-4">
        <div class="card shadow border-0 text-center p-4">
            <h6 class="text-muted text-uppercase">En Çok Alışveriş Yapan</h6>
            <h5 class="fw-bold mt-2">{{ $topCustomer->name }}</h5>
            <p class="text-muted mb-1">{{ $topCustomer->email }}</p>
            <h4 class="text-success fw-bold">
                {{ number_format($topCustomer->total_spent, 2) }} ₺
            </h4>
        </div>
    </div>
    @endif


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const monthlyData = @json($monthlyRevenue);

const labels = monthlyData.map(item => {
    const months = [
        'Ocak','Şubat','Mart','Nisan','Mayıs','Haziran',
        'Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'
    ];
    return months[item.month - 1];
});

const totals = monthlyData.map(item => item.total);

const ctx = document.getElementById('statsChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Aylık Ciro',
            data: totals,
            borderColor: '#ffc107',
            backgroundColor: 'rgba(255,193,7,0.2)',
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});
</script>

@endsection
