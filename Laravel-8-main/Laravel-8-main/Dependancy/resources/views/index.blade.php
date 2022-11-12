<select name="" id="country">
    <option value="">*****Select Country*****</option>
    @foreach ($country as $item)
        <option value="{{ $item->id }}">{{ $item->country }}</option>
    @endforeach
</select>

<select name="" id="state">
    <option value="">*****Select State*****</option>
</select>

<select name="" id="city">
    <option value="">*****Select City*****</option>
</select>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script>

    //country
    $('#country').change(function(){
        let country_id = $(this).val();
        //alert(country_id);
        $('#city').html('<option value="">*****Select City*****</option>')
        $.ajax({
            url: "{{url('/getState')}}",
            type: 'post',
            data: 'country_id='+country_id+'&_token={{csrf_token()}}',
            success: function(response){
                $('#state').html(response)
            }
        });

    });

    //state
    $('#state').change(function(){
        let state_id = $(this).val();
        //alert(country_id);
        $.ajax({
            url: "{{url('/getCity')}}",
            type: 'post',
            data: 'state_id='+state_id+'&_token={{csrf_token()}}',
            success: function(response){
                $('#city').html(response)
            }
        });

    });

</script>


