<div style="width:100%; display: block;float: left">

    <div style="width:30%;display: block;float: left">
        <p>Payroll Reference Number: {{$payroll->refnum}} </p>
        <p>1. I HEREBY CERTIFY that each person whose name appears on this will rendered service as indicated and for this time stated hereon rendered service for the time and at the rates stated under my general supervision and approve payment for this roll.</p>
<br/><br/>
<div class="center">
        {{$payroll->chargeability->headofoffice}}<br/>
    {{$payroll->chargeability->position}}<br/>

    </div>
    </div>

    <div style="width:30%;display: block;float: left;text-align:center">

        <br/>
        <br/>
        <br/>
        Approved:<br/>

        <br/>
        <br/>
        <br/>

        <div class="center">
        CLIVE D. QUIÑO<br/>
        Municipal Mayor<br/>
        </div>
    </div>

    <div style="width:30%;display: block;float: left">
        <p>	Paid in cash to each person whose name appears on the above roll, the amount set opposite his name, he having presented himself, established his identity and affixed his signature or thumb mark on the space provided therefore. Unpaid services are indicated by red ink through the column "Amount Paid".
        </p>
         


            <div class="center">
            LEONILA L. PACA<br/>
        Disbursing Officer<br/>
                <p>
                    (2) APPROVED for payment subject to process:<br/>

                </p>
                <br/><br/>
        ZORAIDA C. LOZADA<br/>
        Municipal Treasurer<br/>
                </div>

    </div>
    <button type="button" onClick="window.print()" style="background: pink">
        PRINT ME!
    </button>
</div>