var x = 2;
document.querySelector('img.more').addEventListener('click', () => {
    if(x <= 5){
        let parent = document.querySelector('div#sender');
        let newInput = document.createElement('input');
        newInput.setAttribute('type','text');
        newInput.setAttribute('class','form-control mt-3 mb-3');
        newInput.setAttribute('placeholder','name@domain.com');
        newInput.setAttribute('name', 'to'+x);
        parent.appendChild(newInput);
        x++;
    }  
});