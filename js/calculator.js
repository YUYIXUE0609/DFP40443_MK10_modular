document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.input-kuantiti');
    const jumlah = document.getElementById('jumlahHarga');

    function calculate() {
        let total = 0;
        inputs.forEach(i => {
            let qty = parseInt(i.value) || 0;
            let price = parseFloat(i.dataset.harga) || 0;
            total += qty * price;
        });
        jumlah.textContent = new Intl.NumberFormat('ms-MY', { style:'currency', currency:'MYR' }).format(total);
    }

    inputs.forEach(i => i.addEventListener('input', calculate));
    calculate();
});