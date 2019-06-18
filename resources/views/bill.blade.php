<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="bill/style.css" media="all" />
  </head>
  <body onload="window.print();window.location = 'met_bill';">
    <header class="clearfix">
      <div id="logo">
        <img src="art.png">
      </div>
      <div id="company">
        <h2 class="name">Art Spot</h2>
        <div> 2/15 West Avenue Street,<br> Rangarajapuram Main Rd,<br> Kodambakkam,Chennai</div>
        <div>044 2484 2464</div>
        <div><a href="mailto:info@artsort.com">info@artsort.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$bill[0]->stu_name}}</h2>
         
        </div>
        <div id="invoice">
          <h1>INVOICE {{$bill[0]->bill_no}} </h1>
          <div class="date">Date of Invoice: {{$bill[0]->date}}</div>
		
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
		@for($i=0;$i<count($bill_details);$i++)
          <tr>
            <td class="no">{{$i+1}}</td>
            <td class="desc"><h3>{{$bill_details[$i]->met_name}}</h3></td>
            <td class="unit">${{$bill_details[$i]->price}}</td>
            <td class="qty">{{$bill_details[$i]->qty}}</td>
            <td class="total">{{$bill_details[$i]->price * $bill_details[$i]->qty}}</td>
          </tr>
        @endfor
        </tbody>
        <tfoot>
         
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
			
            <td>
			
			{{$bill[0]->total}}
	
			</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>