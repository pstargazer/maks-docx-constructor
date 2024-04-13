import './bootstrap';

const spoilers = document.querySelectorAll('.spoiler');

spoilers.forEach(spoiler => {
   spoiler.addEventListener('click', e => {
        e.preventDefault();
        spoiler.classList.toggle('bg-black')
   })
})

// const inputsArr = []
// const inputs = document.querySelectorAll(['.form-control', 'select'])
// const form = document.querySelector('form')

// function setPercent(percent){
//    console.log(percent)
//    document.querySelector('#form-progress').setAttribute('style', `min-height:10px; width:${percent}%`)
// }

// function computePercent() {
//    let filledInps = inputsArr.reduce((prev,curr,idx)=>{
//       // console.log(inputsArr[idx].value);
//       if(Boolean(inputsArr[idx].value)) return ++prev;
//       else return prev
//    },0)
//    let percent = Math.trunc(filledInps/inputsArr.length*100); 
//    return percent
// }

// function updateBar() {
//    let percent = computePercent()
//    setPercent(percent)
//    if(percent == 100) document.querySelector('[type="submit"]').removeAttribute('disabled')
//    else document.querySelector('[type="submit"]').setAttribute('disabled','')
// }

// inputs.forEach(el => {
//    if(el.hasAttribute('required')){
//       let idx = inputsArr.push(el)
//       el.setAttribute('data-id', idx)
//       // console.log(el);
//       el.addEventListener('input', e => {
//          console.log(e)
//          if(e.data == null && e.inputType == 'deleteContentBackward') {
//             e.target.value = null
//          }
//          updateBar()
//       })
//    }

// }) 


form.addEventListener('submit',evt => { 
   // evt.preventDefault()
   // alert('sdf')
})