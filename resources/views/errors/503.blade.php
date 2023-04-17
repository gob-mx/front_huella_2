<style>
    .container-img {
    width: 100%;
    height:100%;   
    margin: 10px auto;
    display: block;
    overflow:hidden;
}

.container-img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>
<body>
    <div class='container-img'>
        <img src="{{ asset(theme()->getMediaUrlPath() . 'errors/error_503_1.jpg') }}" >

    </div>
</body>