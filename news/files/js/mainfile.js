
//анимации + логин форма
$(document).ready(function()
{
    $('.openbutton').on('click', function()
    {
$('body').toggleClass('open')
    })
    $('.closebutton').on('click', function()
    {
     $('body').toggleClass('open')
    })
})


const searchFrom = document.querySelector('.search');
const input = document.querySelector('.search_input');
const newsList = document.querySelector('.news-list');

searchFrom.addEventListener('submit',retrieve)

function retrieve(e)
{
    newsList.innerHTML =''
    e.preventDefault()
    let topic = input.value
    const apiKey = 'fb89237aea724504ae612adc1e824e37'
    let url = `https://newsapi.org/v2/everything?q=${topic}$&apiKey=${apiKey}`

    fetch(url).then((res)=>{
        return res.json()
    }).then((data)=>{
        console.log(data)
        data.articles.forEach(article =>{
           let li = document.createElement('li');
           let a = document.createElement('a');
           let img = document.createElement('images');
           a.setAttribute('href', article.url );
           a.setAttribute('target', '_blank');
           
           a.textContent = article.title;
           li.appendChild(a);
           newsList.appendChild(li);
           
        })
    })
    
    

}
