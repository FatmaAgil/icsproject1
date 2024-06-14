<script>
    document.getElementById('payment-method').addEventListener('change', function() {
        const bankDetails = document.getElementById('bank-details');
        if (this.value === 'bank_transfer') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    });
</script>
