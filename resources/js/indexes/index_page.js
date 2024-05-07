
let records = document.querySelectorAll('td')
let url = new URL(window.location.href);
// url.searchParams.set('record_id', 123);


function viewRecord(url, id){
    url.searchParams.set('record_id', id);
    window.location.replace(url)
    
}

records.forEach(el => {
    el.addEventListener('click',evt => {
        let id = evt.target.parentNode.getAttribute('data-id')
        // console.log(id)
        viewRecord(url, id)
    })
})