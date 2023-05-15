<x-base-layout>

    <style>
        img,pre {
            display: inline-block;
        }
    </style>

	<div class="card card-flush">
		<div class="card-body">
            <img id="gato" src="{{asset('dpfp/images/finger.png')}}" crossorigin="anonymous">

            <pre id="output"></pre>
        </div>
    </div>
    @section('scripts')

    <script type="text/javascript">
        const gatete= document.getElementById('gato');
        const output= document.getElementById('output');

        gatete.addEventListener('click', function (e) {
        let ctx;
        if(!this.canvas) {
            this.canvas = document.createElement('canvas');
            this.canvas.width = this.width;
            this.canvas.height = this.height;
            ctx=this.canvas.getContext('2d');
            ctx.drawImage(this, 0, 0, this.width, this.height);
        } else {
            ctx=this.canvas.getContext('2d');
        }
        const pixel = ctx.getImageData(e.offsetX, e.offsetY, 1, 1).data;
                
        output.innerHTML ='R: ' + pixel[0] + '<br>G: ' + pixel[1] +
            '<br>B: ' + pixel[2] + '<br>A: ' + pixel[3];
                        
        });

    </script>

		
	@endsection

 
</x-base-layout>