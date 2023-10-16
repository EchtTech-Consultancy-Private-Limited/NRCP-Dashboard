        /*handle Form Type*/
const handleFormType = ()=>{

    const formType = $('#formType').find(":selected").attr('form-type');
    $("#diseasesSyndromes").html("");
    let option="";
    if(formType==="p-form"){
        $("#filter_form_type").val(2);
        option="<option value='human_rabies'>Human Rabies</option> <option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
    }else  if(formType==="l-form"){
        $("#filter_form_type").val(1);
        option="<option>Please select Diseases Syndromes</option><option value='laboratary'>Human Rabies and Laboratary</option>";
        $("#diseasesSyndromes").append(option);
    }else{
        $("#filter_form_type").val(3);
        option="<option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
    }
}

const handleFilterValue = ()=>{
    const filter_state = $('#state').find(":selected").val();
    const filter_district = $('#district').find(":selected").val();
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").val();
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();

    filter_state ? $("#filter_state").val(filter_state) : "";
    filter_district ? $("#filter_district").val(filter_district) : "";
    filter_from_year ? $("#filter_from_year").val(filter_from_year) : "";
    filter_to_year ? $("#filter_to_year").val(filter_to_year) : "";
    form_type ? $("#filter_form_type").val(form_type) : "";
    filter_diseasesSyndromes ? $("#filter_diseases").val(filter_diseasesSyndromes) : "";

}

const handleDistrict = ()=>{
    const state_id = $('#state').find(":selected").attr('state-id');
    let option = "<option value=''>Please select district</option>";
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/get-district",
                type: "get",
                data: {
                    state_id: state_id,
                    },
                success: function(result) {
                    if(result){
                        $("#district").html("");
                        result.district_list.forEach((district)=>{
                            option +=`<option value="${district.id}">${district.district_name}</option>`;
                        });
                        $("#district").append(option);
                    }else{
                        $("#district").html("");
                    }
                }
            });
}


/*end here*/
        $(document).ready(function() {

            $('#year').change(function() {
                var fromYear = parseInt($(this).val());
                var toYearSelect = $('#yearto');
                //aleart(toYearSelect)

                // Clear existing options
                toYearSelect.empty();

                // Add options starting from next year
                $('#yearto').html('<option value="" selected>Choose Year</option>');
                for (var year = fromYear + 1; year <= new Date().getFullYear(); year++) {

                    var option = $('<option></option>');
                    option.val(year);
                    option.text(year);

                    toYearSelect.append(option);
                }
            });

            // Set a default selected option
            $('#yearto').append('<option value="" selected>Choose Year</option>');

            // Trigger the change event to populate the "to year" dropdown initially
            // $('#year').change();

            $("#apply_filter").on('click', function() {
                filter_state = $("#filter_state").val();
                filter_district = $("#filter_district").val();
                filter_from_year = $("#filter_from_year").val();
                filter_to_year = $("#filter_to_year").val();
                form_type = $("#filter_form_type").val();
                filter_diseasesSyndromes = $("#filter_diseases").val();
            
                if (year) {
                    $(".detailsDatas").show();
                    $("#detailsData").hide();
                }
            
            
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/test",
                    type: "get",
                    data: {
                        setstate: filter_state,
                        district: filter_district,
                        setyear: filter_from_year,
                        setyearto: filter_to_year,
                        form_type: form_type,
                        filter_diseasesSyndromes: filter_diseasesSyndromes,
                    },
                    success: function(result) {
                        let sessionValue = $("#session-value").val();
                        if (!sessionValue) {
                            sessionValue = 0
                        }
                        $("#detailsData").hide();
                        (async () => {
                            const topology = await fetch(
                                'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                            ).then(response => response.json());
            
                            let statesData = result.array;
            
                            const entries = Object.entries(statesData);
                            const data = entries;
                            const tableBody = $('.detailsDatas tbody');
                            // Clear any existing rows in the table
                            tableBody.empty();
                            // Loop through the entries and add rows to the table
            
                            entries.forEach(function(entry) {
                                const state = entry[0];
                                const cases = entry[1];
                                const row = `
                                        <tr>
                                            <td>${capitalizeFirstLetter(state)}</td>
                                            <td>${sessionValue === 0 ? cases : '' }</td>
                                            <td>${sessionValue === 1 ? cases : ''}</td>
                                        </tr>
                                    `;
                                tableBody.append(row);
                            });
            
                            // Create the chart
                            Highcharts.mapChart('container', {
                                chart: {
                                    map: topology
                                },
            
                                title: {
                                    text: ''
                                },
            
                                subtitle: {
                                    text: ''
                                },
            
                                mapNavigation: {
                                    enabled: true,
                                    buttonOptions: {
                                        verticalAlign: 'bottom'
                                    }
                                },
            
                                colorAxis: {
                                    min: 0
                                },
                                plotOptions: {
                                    series: {
                                        
                                    }
                                },
            
                                series: [{
                                    data: data,
                                    name: '',
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    color: "#fff",
                                    states: {
                                        select: {
                                            color: 'blue'
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false,
                                        format: '{point.name}'
                                    }
                                }]
            
                            });
            
                        })();
            
            
            
                    }
                });
            
            });
    
        });
    
        $(document).ready(function() {

            let mapdata = "";
            year = $('#year').val();
            $('.statewise').hide();
            $('#yeartostate').hide();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/human-rabies",
                type: "get",
                success: function(result) {
                    let sessionValue = $("#session_value").val();
                    if (!sessionValue) {
                        sessionValue = 0
                    }

                    (async () => {

                        const topology = await fetch(
                            'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                        ).then(response => response.json());


                        const statesData = result.array;
                        const entries = Object.entries(statesData);
                        const data = entries;
                        const tableBody = $('.detailsDatas tbody');

                        // Clear any existing rows in the table
                        tableBody.empty();
                        $('#detailsData').hide();

                        // Loop through the entries and add rows to the table
                        entries.forEach(function(entry) {
                            const state = entry[0];
                            const cases = entry[1];
                            const row = `
                                <tr>
                                    <td>${capitalizeFirstLetter(state)}</td>
                                    <td>${sessionValue == 0 ? cases : '' }</td>
                                    <td>${sessionValue == 1 ? cases : ''}</td>
                                </tr>
                            `;

                            tableBody.append(row);
                        });
                        // Create the chart
                        Highcharts.mapChart('container', {
                            chart: {
                                map: topology
                            },

                            title: {
                                text: ''
                            },

                            subtitle: {
                                text: ''
                            },

                            mapNavigation: {
                                enabled: true,
                                buttonOptions: {
                                    verticalAlign: 'bottom'
                                }
                            },

                            colorAxis: {
                                min: 0
                            },
                            plotOptions: {
                                series: {
                                    events: {
                                        click: function(e) {

                                            let nameState = e.point.name


                                            $('.detailsDatas').hide();
                                            if ($('#state').val() != '') {
                                                $('#state').val('');
                                                $('.statewise').hide();
                                            }

                                            if (nameState) {

                                                $(".detailsDatas").hide();

                                            }

                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $(
                                                        'meta[name="csrf-token"]'
                                                    ).attr(
                                                        'content')
                                                }
                                            });

                                            $.ajax({
                                                url: "/human-rabies-death",
                                                type: "get",
                                                data: {
                                                    setyear: year,
                                                    name: nameState
                                                },
                                                success: function(result) {

                                                    $('#totalDeath')
                                                        .text(result
                                                            .human_rabies_deaths
                                                        );

                                                }

                                            });

                                            $("#detailsData").show();

                                            console.log(e.point.name,' name.....')
                                            // var sessionvalue =
                                            //     "{{ session('type') }}"
                                            //alert(sessionvalue);
                                            if (sessionValue == '1') {


                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td><span id='totalDeath'></span></td><td>" +
                                                    e.point.value +
                                                    "</td></tr></tbody></table> </div>";

                                            } else {

                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td>" + e.point.value +
                                                    "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                            }



                                            $("#detailsData").html(StateContent);

                                            // Swal.fire({
                                            //     position: 'top-end',
                                            //     icon: 'success',
                                            //     title: 'State records fetched successfully',
                                            //     showConfirmButton: false,
                                            //     timer: 3000
                                            // })


                                        }
                                    }
                                }
                            },
                            // tooltip: {
                            //     pointFormatter: function() {

                            //         console.log(data)
                            //     return `<b>State:</b> ${this.name}</br><b>Total Death:</b> ${this.name}</br>`
                            //     }
                            // },
                            series: [{
                                data: data,
                                name: '',
                                allowPointSelect: true,
                                cursor: 'pointer',
                                color: "#fff",
                                states: {
                                    select: {
                                        color: 'blue'
                                    }
                                },
                                dataLabels: {
                                    enabled: false,
                                    format: '{point.name}'
                                }
                            }]

                        });

                    })();



                }
            });

        });
    
   

 
        $('#type').on('change', function() {
            
            let typeValue = $(this).val(); // The value you want to store in the session
            $("#session_value").val(typeValue);
            $.ajax({
                url: '/set-session',
                type: 'get',
                data: {
                    type: typeValue
                },
                headers: {
                    'X-CSRF-TOKEN': 'your_csrf_token_here' // Include CSRF token if required
                },
                success: function(response) {
                    location.reload(true);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

        })

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    