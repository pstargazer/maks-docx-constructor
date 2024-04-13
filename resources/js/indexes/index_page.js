
let records = document.querySelectorAll('tr')
let url = new URL(window.location.href);
// url.searchParams.set('record_id', 123);


function viewRecord(url, id){
    // let recId = 1
    alert(url)
    url.searchParams.set('record_id', id);
    window.location.replace(url)
    
}

records.forEach(el => {
    el.addEventListener('click',evt => {
        let id = evt.target.getAttribute('data-id')
        viewRecord(url, id)
    })
})