

window.onload = function(){
    document.getElementById("download").addEventListener("click",()=>{
        const invoice = this.document.getElementById("letter");
        console.log(invoice);
        console.log(window);
        html2pdf().from(invoice).save();
        //window.location.replace("expense-getinvoice.php");
    })
}