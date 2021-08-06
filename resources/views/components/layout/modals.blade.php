<div class="modal" id="policy_calculator_modal" tabindex="-1" role="dialog" aria-labelledby="PolicyCalculatorModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content card-shadow card-rounded">
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
							<input type="text" class="form-control datepicker" placeholder="Wskaż datę" id="MyDate"/>
						</div>
					</div>
				</div>
				<div class="form-group m-form__group row pt-3">
					<label class="col-form-label col-lg-3 col-sm-12">
						Koniec
					</label>
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="input-group date" >
							<input type="text" class="form-control datepicker" value="<?php echo date("Y-m-d"); ?>" id="MyDateEnd"/>
						</div>
					</div>
				</div>
    			<div style="padding-top: 10px; font-size: 15px">
					<div class="pt-3">Rok polisowy: <span id="rok"></span><br/></div>
					<div class="pt-3">Miesiąc polisowy: <span id="miesiac"></span><br/></div>
    			</div>
    		</div>
			<div class="modal-footer" style="border: 0px; padding-top: 0px;">
				<button type="button" class="btn btn-primary btn-shadow font-weight-bold me-2" onclick="policyCalcFunc()">Oblicz</button>
			</div>
		</div>
	</div>
</div>