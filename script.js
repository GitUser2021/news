ref_input_news = $('#input-news')[0];
let query;

ref_input_news.addEventListener('change', e => {
    query = ref_input_news.value;
    window.open(`index.php?q=${query}`,'_self');
})