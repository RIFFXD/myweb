// Mengambil elemen tombol dan konten yang relevan
const showStoryButton = document.getElementById('showStory');
const storyContent = document.getElementById('storyContent');

const showAbstractButton = document.getElementById('showAbstract');
const abstractContent = document.getElementById('abstractContent');

const showEvaluationButton = document.getElementById('showEvaluation');
const evaluationContent = document.getElementById('evaluationContent');

const showAnalysisButton = document.getElementById('showAnalysis');
const analysisContent = document.getElementById('evaluationContent');

// Fungsi untuk menampilkan konten cerpen
showStoryButton.addEventListener('click', () => {
    storyContent.classList.toggle('hidden');
    showStoryButton.textContent = storyContent.classList.contains('hidden') ? 'Lihat Cerpen' : 'Sembunyikan Cerpen';
});

// Fungsi untuk menampilkan konten abstrak
showAbstractButton.addEventListener('click', () => {
    abstractContent.classList.toggle('hidden');
    showAbstractButton.textContent = abstractContent.classList.contains('hidden') ? 'Lihat Abstrak' : 'Sembunyikan Abstrak';
});

// Fungsi untuk menampilkan konten evaluasi
showEvaluationButton.addEventListener('click', () => {
    evaluationContent.classList.toggle('hidden');
    showEvaluationButton.textContent = evaluationContent.classList.contains('hidden') ? 'Lihat Evaluasi & Revolusi' : 'Sembunyikan Evaluasi & Revolusi';
});

// Fungsi untuk menampilkan konten analisis
showAnalysisButton.addEventListener('click', () => {
    analysisContent.classList.toggle('hidden');
    showAnalysisButton.textContent = analysisContent.classList.contains('hidden') ? 'Lihat Unsur Intrinsik dan Ekstrinsik' : 'Sembunyikan Unsur Intrinsik dan Ekstrinsik';
});