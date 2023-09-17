const linkMapper = {
    'codecompiler' : './Modules/CodeCompiler/index.html'
} 
const mainDiv = '#DivMain';

function LoadToMainDiv(url) {
    if(url === undefined || url.length == 0){
        return;
    }
    $(mainDiv).load(url);
}

function LoadPage(element){
    if(element === undefined){
        return;
    }

    let link = linkMapper[$(element).data('navLink')]
    LoadToMainDiv(link);
}