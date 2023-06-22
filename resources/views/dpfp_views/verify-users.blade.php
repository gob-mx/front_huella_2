<x-base-layout>

	<div class="card card-flush">
		<div class="card-body">
			<div id="content_">
				<div>
					<div>
						<div style=" float: right">
							<div class="date">
								<span class="colorGray">
									<span class="colorGray" id="weekDay" class="weekDay" ></span>,
									<span class="colorGray" id="day" class="day" ></span> de
									<span class="colorGray" id="month" class="mont" ></span> del
									<span class="colorGray" id="year" class="year" ></span>
								</span>
							</div>
							<div class="clock">                                            
								<span class="colorGray"  class="hours" >Hora: </span>
								<span class="colorGray" id="hours" class="hours" ></span>:
								<span class="colorGray" id="minutes" class="minutes" ></span>:
								<span class="colorGray" id="seconds" class="seconds" ></span>
							</div>
						</div>           
					</div>
					<div>
						<div  style="margin:0px auto;width: 30% !important;">
							<div style="text-align: center;">
								<div>
									<div>
										<img src="{{asset('dpfp/images/finger.png')}}" class="rounded-3 mb-4 w-500px h-550px border-dashed border-success imgFinger" />
										<h5 class="u_nombre" ></h5>
										<h5 class="location text-sm-center u_identificacion" ></h5>
										<h5 class="txtFinger" ></h5>
									</div>
								</div>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>

	

</x-base-layout>