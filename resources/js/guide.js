<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  document.addEventListener('DOMContentLoaded', (event) => {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    
    const recyclingRate = document.getElementById('recyclingRate');
    const recyclingRateValue = document.getElementById('recyclingRateValue');

    recyclingRate.addEventListener('input', () => {
      recyclingRateValue.textContent = recyclingRate.value;
    });


    const recyclingProgress = document.getElementById('recyclingProgress');
    const recyclingProgressValue = document.getElementById('recyclingProgressValue');

    recyclingProgress.addEventListener('input', () => {
      recyclingProgressValue.textContent = recyclingProgress.value;
    });
  });

