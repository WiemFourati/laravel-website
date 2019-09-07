<h1>ExaDev Email Service</h1>
    <p>you have new command from 
       <strong> {{$email->name}} </strong>
    <br>e-mail adress :<address title="contact">
<a href="mailto:{{$email->email}}">{{$email->email}}</a>
</address>
    <br>product : {{$email->produit}}
    <b>quantity : {{$email->quantity}}
    <br>message: {{$email->message}}</p>
