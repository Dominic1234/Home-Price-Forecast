document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const resultsContainer = document.getElementById('resultsContainer');
  
    if (!searchInput || !resultsContainer || typeof troubleshootSections === 'undefined') return;
  
    searchInput.addEventListener('input', () => {
      const query = searchInput.value.toLowerCase().trim();
      resultsContainer.innerHTML = '';
  
      if (!query) {
        resultsContainer.style.display = 'none';
        return;
      }
  
      const matched = troubleshootSections.filter(
        section =>
          section.title.toLowerCase().includes(query) ||
          section.content.toLowerCase().includes(query)
      );
  
      if (matched.length === 0) {
        resultsContainer.innerHTML = `<div class="result">❌ No results found.</div>`;
      } else {
        matched.forEach(section => {
          const el = document.createElement('div');
          el.className = 'result';
          el.innerHTML = `<strong>${section.title}</strong><br><small>${section.content}</small>`;
          el.onclick = () => {
            // Navigate to troubleshoot.php with anchor (if on a different page)
            window.location.href = `troubleshoot.php#${section.id}`;
          };
          resultsContainer.appendChild(el);
        });
      }
  
      resultsContainer.style.display = 'block';
    });
  });
  