
<div class="modal" id="policy_calculator_modal" tabindex="-1" role="dialog" aria-labelledby="PolicyCalculatorModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="PolicyCalculatorModal">
					Kalkulator miesięcy polisowych
				</h5>							
			</div>
			<div class="modal-body text-center">
				<div style="padding-bottom: 20px;">
					Wprowadź datę rozpoczęcia Polisy/Ubezpieczenia, a następnie wybierz Oblicz. Kalkulator pokażę w którym miesiącu oraz roku polisowym znajduje się Ubezpieczenia.
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">
						Początek
					</label>
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="input-group date">
							<input type="text" class="form-control m-input" placeholder="Wskaż datę" id="MyDate"/>
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-calendar-check-o"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label class="col-form-label col-lg-3 col-sm-12">
						Koniec
					</label>
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="input-group date" >
							<input type="text" class="form-control m-input" value="<?php echo date("Y-m-d"); ?>" id="MyDateEnd"/>
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-calendar"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
    			<div style="padding-top: 10px; font-size: 15px" class="alert alert-light" role="alert">
    			    Rok polisowy: <span id="rok"></span><br/>
    			    Miesiąc polisowy: <span id="miesiac"></span><br/>
    			</div>
    		</div>
			<div class="modal-footer" style="border: 0px; padding-top: 0px;">
				<button type="button" class="btn btn-text-dark btn-hover-light-dark mr-2" data-dismiss="modal">Wyjdź</button>
				<button type="button" class="btn btn-primary btn-shadow font-weight-bold mr-2" onclick="policyCalcFunc()">Oblicz</button>
			</div>
		</div>
	</div>
</div>