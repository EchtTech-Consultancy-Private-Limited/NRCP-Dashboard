 const BASE_URL = window.location.origin;
// const BASE_URL =window.location.origin+"/public";

/*handle Form Type*/
const handleFormType = () => {
    const formType = $('#formType').find(":selected").attr('form-type');
    $("#diseasesSyndromes").html("");
    let option = "";
    if (formType === "p-form") {
        $("#filter_form_type").val(2);
        $("#graphical_view").show();
        option = "<option value='human_rabies'>Human Rabies</option> <option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
        $('#l-dropdown option[value=""]').prop('selected', 'selected');
        $("#l-dropdown").hide();
        $("#test_performed").hide();
        $("#type").show();

    } else if (formType === "l-form") {
        $("#filter_form_type").val(1);
        // $("#graphical_view").hide();
        $('#l-dropdown option[value="person_tested"]').prop('selected', 'selected');

        option = "<option value='laboratary'>Human Rabies</option>";
        $("#diseasesSyndromes").append(option);
        $("#l-dropdown").show();
        $("#test_performed").show();
        $("#type").hide();
        $("#map-text").html("Animal Bite - Dog Bite (Laboratory Cases) in India")

    } else {
        $("#filter_form_type").val(3);
        // $("#graphical_view").hide();
        option = "<option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
        // $('#l-dropdown option[value=""]').attr("selected", true);
        $('#l-dropdown option[value=""]').prop('selected', 'selected');
        $("#l-dropdown").hide();
        $("#test_performed").hide();
        $("#type").show();
        $("#map-text").html("Animal Bite - Dog Bite (Syndromic Surveillance) Cases in India")
    }
}

const handleFilterValue = () => {
    const filter_state = $('#state').find(":selected").val();
    const filter_district = $('#district').find(":selected").val();
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").val();
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();

    filter_state ? $("#filter_state").val(filter_state) : "";
    filter_district ? $("#filter_district").val(filter_district) : "";
    filter_from_year ? $("#filter_from_year").val(filter_from_year) : "";
    filter_to_year ? $("#filter_to_year").val(filter_to_year) : "";
    form_type ? $("#filter_form_type").val(form_type) : "";
    filter_diseasesSyndromes ? $("#filter_diseases").val(filter_diseasesSyndromes) : "";
    l_dropdown ? $("#l-dropdown").val(l_dropdown) : "";

    filter_diseasesSyndromes === "animal_bite" ? $("#map-text").html("Animal Bite - Dog Bite (Presumptive Cases) in India") : $("#map-text").html("Human Rabies (Presumptive Cases) in India");

}

const getLFormData = () => {
    apply_filter();
}

const handleTestPerformed = () => {
    const arr = [];
    $.each($("input[name='test-perfomed']:checked"), function () {
        arr.push($(this).val());
    });
}

const handleDistrict = () => {
    const state_id = $('#state').find(":selected").attr('state-id');
    let option = "<option value=''>Please select district</option>";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: BASE_URL + "/get-district",
        type: "get",
        data: {
            state_id: state_id,
        },
        success: function (result) {
            if (result) {
                $("#district").html("");
                result.district_list.forEach((district) => {
                    option += `<option value="${district.id}" dist-name="${district.district_name}">${district.district_name}</option>`;
                });
                $("#district").append(option);
            } else {
                $("#district").html("");
            }
        }
    });
}

/*end here*/
$(document).ready(function () {
    $("#l-dropdown").hide();
    $('.lform').hide()
    $('.l-form-map').hide()
    $('#test_performed').hide()
    $('#year').change(function () {
        var fromYear = parseInt($(this).val());
        var toYearSelect = $('#yearto');
        //aleart(toYearSelect)

        // Clear existing options
        toYearSelect.empty();

        // Add options starting from next year
        $('#yearto').html('<option value="" selected>Choose Year</option>');
        for (var year = fromYear; year <= new Date().getFullYear(); year++) {

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

    $("#apply_filter").on('click', function () {
        apply_filter();

    });

    $("#reset_button").on('click', function () {
        resetButton()
        // apply_filter();
    });

});

function resetButton() {
    $('.state_filter_district').html('State')
    $('#filter_state').val('')
    $('#state option[value=""]').prop('selected', 'selected').change();
    $('#district option[value=""]').prop('selected', 'selected').change();
    $('#year option[value="2022"]').prop('selected', 'selected').change();
    $('#yearto option[value=""]').prop('selected', 'selected').change();
    $('#formType option[value="2"]').prop('selected', 'selected').change();
    $('#diseasesSyndromes option[value="human_rabies"]').prop('selected', 'selected').change();
    const search_btn = $("#apply_filter");
    search_btn.attr("disabled", false);
    let loading_content = 'Search';
    search_btn.html(loading_content);
    $("#stateMap").hide();
    $("#container").show();
    defaultLoadMapData();
}

const apply_filter = () => {
    // const filter_state = $('#state').find(":selected").val();
    const filter_state = $('#filter_state').val();
    const filter_district = $('#district').find(":selected").val();
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").val();
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    const session_value = $('#session_value').val();

    const search_btn = $("#apply_filter");
    search_btn.attr("disabled", true);
    let loading_content = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    search_btn.html(loading_content);
    if (form_type == 1) {
        $('.s-p-form-map').hide();
        $('.l-form-map').show();
        $('#l-dropdown').show();
        $("#type").hide();

    } else {
        $('.s-p-form-map').show();
        $("#type").show();
        $('.l-form-map').hide();
        $('#l-dropdown').hide();
    }

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
        url: BASE_URL + "/get-filter-data",
        type: "get",
        data: {
            setstate: filter_state,
            district: filter_district,
            setyear: filter_from_year,
            setyearto: filter_to_year,
            form_type: form_type,
            filter_diseasesSyndromes: filter_diseasesSyndromes,
            l_dropdown: l_dropdown,
            session_value: session_value
        },
        success: function (result) {

            if (result.array == '' || result.array == null) {
                defaultLoadMapData();
                resetButton();
                //console.log('hiisdfds');
                return;
            }
            let statesData = result.array;
            const entries = Object.entries(statesData);

            if (filter_district != '' || filter_state != '') {
                $('.state_filter_district').html('District')
            }


            if (filter_state != '') {
                drilldownHandle(result)
            }

            search_btn.html("Search");
            search_btn.attr("disabled", false);
            search_btn.html("Search");
            search_btn.attr("disabled", false);
            if (form_type == '2') {
                googlePieChart(result);
                barChart(result[0]);
                pyramidChart(result[0]);
                //  highchartMapcase(result.total_records);
                //  highchartMapDeath(result.total_records);
            }

            if (form_type == '1') {
                $('.defaultform').hide()
                $('.lform').show()
                //  highchartMapcase(result.total_records);
                //  highchartMapDeath(result.total_records);
            }

            if (form_type == '1') {

                $('#box3').html(result.laboratory_total);
                $('#box4').html(result.laboratory_samples);
                $('#box5').html(result.laboratory_Positive);
            } else {
                $('.lform').hide()
                $('.defaultform').show()
                //  highchartMapcase(result.total_records);
                //  highchartMapDeath(result.total_records);
                if (form_type == '3') {
                    $('#box1').html("Total Cases-" + " " + result.human_rabies_case);
                    $('#box2').html("Total Deaths-" + " " + result.human_rabies_deaths);
                    $('#text1').html("Syndromic Surveillance Cases");
                    $('#text2').html("Syndromic Surveillance Cases");

                } else {
                    $('#text1').html("Presumptive Cases");
                    $('#text2').html("Presumptive Cases");
                    $('#box1').html("Total Cases-" + " " + result.human_rabies_case);
                    $('#box2').html("Total Deaths-" + " " + result.human_rabies_deaths);
                }
            }
            let sessionValue = $("#session_value").val();
            let case_type_col = result?.case_type_col;

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
            const selectedType = $('#type').val();

                // Loop through the entries and add rows to the table
                entries.forEach(function (entry) {
                    const state = entry[0];
                    const cases = entry[1];
                    // console.log(state, cases);
                    // console.log("test data")
                    if (l_dropdown == "") {
                        const row = `
                            <tr>
                                <td>${capitalizeFirstLetter(state)}</td>
                                <td>${sessionValue == 0 ? cases : 0}</td>
                                <td>${sessionValue == 1 ? cases : 0}</td>
                            </tr>
                        `;
                        tableBody.append(row);
                    } else {
                        let row = `<tr><td>${capitalizeFirstLetter(state)}</td>`;
                        if (case_type_col) {
                            row += `
                                <td>${case_type_col === 1 ? cases : 0}</td>
                                <td>${case_type_col === 2 ? cases : 0}</td>
                                <td>${case_type_col === 3 ? cases : 0}</td>
                            `;
                        } else {
                            if (selectedType == 1){
                                row += `<td>0</td>`;
                                row += `<td>${cases}</td>`;
                            }
                            if (selectedType == 0){
                                row += `<td>${cases}</td>`;
                                row += `<td>0</td>`;
                            }

                        }
                        row += `</tr>`;
                        tableBody.append(row);
                    }
                });
                let options = {
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
                        min: 0,
                        max: 100,
                        minColor: '#fcad95',
                        maxColor: '#ab4024',
                        labels: {
                            format: '{value}',
                        },
                    },
                    plotOptions: {
                        series: {
                            events: {
                                click: function (e) {
                                    let nameState = e.point.name

                                    $('#filter_state').val(nameState);
                                    apply_filter();

                                }
                            },
                            dataLabels: {
                                enabled: false,
                                format: '{point.value}' // Customize the format as needed
                            }
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
                                color: '#fcad95'
                            }
                        },
                        exporting: {
                            enabled: true,
                            buttons: {
                                contextButton: {
                                    menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                                }
                            }
                        }
                    }]

                }

                //  Create the chart
                if (filter_state === '') {
                    Highcharts.mapChart('container',
                        options
                    );
                }
            })();


        },
        error: (xhr, status) => {
            search_btn.html("Search");
            search_btn.attr("disabled", false);
        }
    });
}

const defaultLoadMapData = () => {
    year = $('#year').val();

    $('.statewise').hide();
    $('#yeartostate').hide();
    $("#stateMap").hide();


    $("#mySelect2").select2({
        tags: true,
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: BASE_URL + "/human-rabies",
        type: "get",
        success: function (result) {
            $('#text1').html("Presumptive Cases");
            $('#text2').html("Presumptive Deaths");
            $('#box1').html("Total Cases -" + " " + result.total_cases);
            $('#box2').html("Total Deaths -" + " " + result.total_deaths);
            /*Google Chart Pie Chart*/
            googlePieChart(result);


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
                entries.forEach(function (entry) {
                    const state = entry[0];
                    const cases = entry[1];
                    const row = `
                      <tr>
                          <td>${capitalizeFirstLetter(state)}</td>
                          <td>${sessionValue == 0 ? cases : 0}</td>
                          <td>${sessionValue == 1 ? cases : 0}</td>
                      </tr>
                  `;

                    tableBody.append(row);
                });

                Highcharts.mapChart('container', {
                    chart: {
                        map: topology,
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
                        min: 0,
                        max: 100,
                        minColor: '#fcad95',
                        maxColor: '#ab4024',
                        labels: {
                            format: '{value}',
                        },
                    },
                    plotOptions: {
                        series: {
                            events: {
                                click: function (e) {
                                    //  console.log(e.point)
                                    let nameState = e.point.name
                                    updateStateListDropdown(nameState);
                                    $('#filter_state').val(nameState);
                                    apply_filter();
                                }
                            },
                            dataLabels: {
                                enabled: false,
                                format: '{point.value}' // Customize the format as needed
                            }
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
                                color: '#fcad95'
                            }
                        }
                    }],
                    exporting: {
                        enabled: true,
                        buttons: {
                            contextButton: {
                                menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                            }
                        }
                    }
                });

            })();
        }
    });


    // pyramid chart
    $.ajax({
        url: BASE_URL + "/p-form-horizontal-barchart",
        type: "get",
        success: function (result) {
            pyramidChart(result);
        }
    });

    //high chart
    $.ajax({
        url: BASE_URL + "/p-form-high-chart",
        type: "get",
        success: function (result) {
            highchartMapcase(result);
            highchartMapDeath(result);
        }
    });

}

$(document).ready(function () {

    defaultLoadMapData();

});

const getDistrictValue = (s_name, entries) => {

    let m = 0;
    entries.map((items) => {
        // console.log(items,' first time')
        if (s_name == items[0].toLowerCase()) {
            m = items[1];
        }
    })
    return m;
}

//state wise map
async function drilldownHandle(state) {

    let statesData = state.array;

    const entries = Object.entries(statesData);
    const selectedMapData = DISTRICT_MAPS.find(data => {
        const dataName = data.name.toLowerCase();
        const stateName = String(state.setstateMap).toLowerCase();
        return dataName === stateName;
    });
    const district_list = selectedMapData.data;

    const updatedArray = district_list.map((item) => {
        //console.log(item,'item');
        return {
            ...item,
            data: item.data.map((mapColor) => {

                //   console.log(mapColor)
                return {
                    ...mapColor,
                    color: '#ce4c39'
                };
            }),

            mapData: item.mapData.map((mapItem) => {
                const value = getDistrictValue(mapItem.name.toLowerCase(), entries);
                return {
                    ...mapItem,
                    value: value,
                };
            }),
        };
    });


    Highcharts.mapChart('container', {
        chart: {
            map: india,
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
            min: 0,
            max: 100,
            minColor: '#fcad95',
            maxColor: '#b31404',
            labels: {
                format: '{value}',
            },
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: false,
                    format: '{point.value}', // You can customize the format as needed
                },
                events: {
                    click: function (e) {
                        // Handle click events here
                    }
                }
            }
        },
        series: updatedArray,

    });

}

$('#type').on('change', function () {
    const typeValue = $('#type').find(":selected").val();
    $("#session_value").val(typeValue);
    apply_filter();
});

const updateStateListDropdown = (state_name) => {
    const selectElement = document.getElementsByName("state_name");
    let sl = document.querySelector('#state');
    const selectOptions = selectElement[0].children;
    for (let i = 0; i < selectOptions.length; i++) {
        const option = selectOptions[i];
        const optionValue = option.attributes[0].value;
        if (optionValue.length) {
            if (optionValue.toLowerCase() == state_name.toLowerCase()) {
                sl.selectedIndex = i;
                const changeEvent = new Event("change", {
                    bubbles: true,
                    cancelable: true,
                });
                sl.dispatchEvent(changeEvent);
            }
        }
    }
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

document.addEventListener('DOMContentLoaded', function () {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $(
                'meta[name="csrf-token"]'
            ).attr(
                'content')
        }
    });

    $.ajax({
        url: BASE_URL + "/pform-horizontal-barchart-death",
        type: "get",

        success: function (result) {

            barChart(result);


        }

    });

});

const googlePieChart = (result) => {
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    var mapFilterType = $('#type').find(":selected").val();
    if (result.length < 1) {
        $("#is_graph_data_available").val("No graph data available");
    } else {
        $("#is_graph_data_available").val("");
    }
    let is_graph_data_available = $("#is_graph_data_available").val();
    is_graph_data_available = is_graph_data_available !== "" ? is_graph_data_available : "";

    /*google chart start*/

    var mapFilterTypeText = "";
    if (mapFilterType == 0) {
        mapFilterTypeText = "Cases";
    } else {
        mapFilterTypeText = "Death";
    }


    Highcharts.chart('containerPie', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: `Cases by Gender in India ${filter_state !== undefined ? filter_state + ' >' : ''} ${filter_district !== undefined ? filter_district + ' >' : ''} ${filter_from_year !== "" ? filter_from_year + ' >' : ''} ${filter_to_year !== "" ? filter_to_year + ' >' : ''}    n=(${result.total})`,
            align: 'left',
            style: {
                fontSize: '15px' // Set the font size here
            }
        },
        subtitle: {
            text: 'Gender Percentage',
            align: 'left'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: `${mapFilterTypeText}`,
            data: [
                ['Male', Math.trunc(result.male_percentage)],
                ['Female', Math.trunc(result.female_percentage)]
            ]
        }]
    });


    // 2nd pie chart

    Highcharts.chart('containerPie2nd', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: `Death by Gender in India ${filter_state !== undefined ? filter_state + ' >' : ''} ${filter_district !== undefined ? filter_district + ' >' : ''} ${filter_from_year !== "" ? filter_from_year + ' >' : ''} ${filter_to_year !== "" ? filter_to_year + ' >' : ''}  n=(${result.total_death_google_graph})`,
            align: 'left',
            style: {
                fontSize: '15px' // Set the font size here
            }
          
        },
        subtitle: {
            text: 'Gender Percentage',
            align: 'left'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: `${mapFilterTypeText}`,
            data: [
                ['Male', Math.trunc(result.male_percentage_death)],
                ['Female', Math.trunc(result.female_percentage_death)]
            ]
        }]
    });

    /*end google chart*/
}

const pyramidChart = (result) => {
    // console.log(result);
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if (result.length < 1) {
        $("#is_graph_data_available").val("No graph data available");
    } else {
        $("#is_graph_data_available").val("");
    }
    let is_graph_data_available = $("#is_graph_data_available").val();
    is_graph_data_available = is_graph_data_available !== "" ? is_graph_data_available : "";
    var options_val = {
        text: `Case by age group in India ${filter_state !== undefined ? filter_state + ' >' : ''} ${filter_district !== undefined ? filter_district + ' >' : ''} ${filter_from_year !== "" ? filter_from_year + ' >' : ''} ${filter_to_year !== "" ? filter_to_year + ' >' : ''}`,
    };


    let categories = result.map(item => item.pyramid_age_group);

    let females = {
        name: 'Female',
        data: result.map(item => item.pyramid_female_percentage)
    };

    let males = {
        name: 'Male',
        data: result.map(item => -item.pyramid_male_percentage)
    };

    let options = {
        series: [males, females],
        chart: {
            type: 'bar',
            height: 440,
            stacked: true
        },
        colors: ['#ed855a', '#712980'],
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '80%',
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: 1,
            colors: ["#fff"]
        },
        grid: {
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        yaxis: {
            min: -100,
            max: 100,
            title: {
                // text: 'Age',
            },
        },
        tooltip: {
            shared: false,
            x: {
                formatter: function (val) {
                    return val
                }
            },
            y: {
                formatter: function (val) {
                    return Math.abs(val) + "%"
                }
            }
        },
        title: {
            text: options_val.text,
            style: {
                fontSize: '15px' // Set the font size here
            }
        },
        subtitle: {
            text: is_graph_data_available,
            style: {
                fontSize: '20px' // Set the font size here
            }
        },
        
        xaxis: {
            categories: categories,
            title: {
                text: 'Percent'
            },
            labels: {
                formatter: function (val) {
                    return Math.abs(Math.round(val)) + "%"
                }
            }
        },
    };
    const chartContainer = document.querySelector("#chart");
    chartContainer.innerHTML = '';
    let chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
}

const barChart = (result) => {
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if (result.length < 1) {
        $("#is_graph_data_available").val("No graph data available");
    } else {
        $("#is_graph_data_available").val("");
    }
    let is_graph_data_available = $("#is_graph_data_available").val();
    is_graph_data_available = is_graph_data_available !== "" ? is_graph_data_available : "";

    var options_val = {
        text: `Death by age group in India ${filter_state !== undefined ? filter_state + ' >' : ''} ${filter_district !== undefined ? filter_district + ' >' : ''} ${filter_from_year !== "" ? filter_from_year + ' >' : ''} ${filter_to_year !== "" ? filter_to_year + ' >' : ''}  `,
       

    };
    var categories = result.map(item => item.pyramid_age_group);

    var males = {
        name: 'Male',
        data: result.map(item => item.pyramid_male_death_percentage)
    };
    var females = {
        name: 'Female',
        data: result.map(item => item.pyramid_female_death_percentage)
    };
    Highcharts.chart('chartContainer', {
        chart: {
            type: 'bar'
        },
        title: {
            text: options_val.text,
            style: {
                fontSize: '15px' // Set the font size here
            }
        },
        
        subtitle: {
            text: is_graph_data_available,
        },
        xAxis: {
            categories: categories,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Cases',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [males, females]
    });
}

const highchartMapcase = (total_records) => {
    // console.log(total_records[0].value);
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if (total_records.length < 1) {
        $("#is_graph_data_available").val("No graph data available");
    } else {
        $("#is_graph_data_available").val("");
    }

    var jsData = [['Year', 'Cases']]; // Initialize the data array with column headers

    for (var i = 0; i < total_records.length; i++) {
        jsData.push([total_records[i].year]);
    }


    var mapFilterType = $('#type').find(":selected").val();
    var mapFilterTypeText = "";
    if (mapFilterType == 0) {
        mapFilterTypeText = "Cases";
    } else {
        mapFilterTypeText = "Death";
    }
    const filteredRecords = total_records.filter(record => record["case"]);


    new Highcharts.Chart('barchart_materialcase', {
        chart: {
            renderTo: 'barchart_materialcase',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        xAxis: {
            categories: total_records.map(record => record["year"])
        },
        yAxis: {
            title: {
                enabled: false
            }
        },
        tooltip: {
            headerFormat: `${mapFilterTypeText} `,
            pointFormat: ' {point.y}'
        },
        title: {
            text: ``,
            align: 'left'
        },
        subtitle: {
            text: 'Cases',
            align: 'left'
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            data: filteredRecords.map(record => parseInt(record["case"])),
            colorByPoint: true
        }]
    });


}

const highchartMapDeath = (total_records) => {
    // console.log(total_records[0].value);
    const filter_state = $('#state').find(":selected").attr('state-name');
    const filter_district = $('#district').find(":selected").attr('dist-name');
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").attr('form-type');
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();
    const l_dropdown = $('#l-dropdown').find(":selected").val();
    if (total_records.length < 1) {
        $("#is_graph_data_available").val("No graph data available");
    } else {
        $("#is_graph_data_available").val("");
    }

    const filteredRecords = total_records.filter(record => record["death"]);

    new Highcharts.Chart('barchart_materialdeaths', {
        chart: {
            renderTo: 'barchart_materialdeaths',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        xAxis: {
            categories: total_records.map(record => record["year"])
        },
        yAxis: {
            title: {
                enabled: false
            }
        },
        tooltip: {
            headerFormat: `Death`,
            pointFormat: ' {point.y}'
        },
        title: {
            text: ``,
            align: 'left'
        },
        subtitle: {
            text: 'Death',
            align: 'left'
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            data: filteredRecords.map(record => parseInt(record["death"])),
            colorByPoint: true
        }]
    });


}


// sticky nav script
window.onscroll = function () {
    myFunction()
};

// Get the navbar
var navbar = document.getElementById("dashboard-filter");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}


$(document).ready(function () {
    // Function to populate #yearto dropdown based on the selected year from #year
    function populateToYearDropdown() {
        var fromYear = parseInt($('#year').val());
        var toYearSelect = $('#yearto');

        // Clear existing options
        toYearSelect.empty();

        // Add options starting from the selected year up to the current year
        // toYearSelect.html('<option value="" selected>Choose Year</option>');
        for (var year = fromYear; year <= new Date().getFullYear(); year++) {
            var option = $('<option></option>');
            option.val(year);
            option.text(year);
            toYearSelect.append(option);
        }
    }

    // Trigger the function on page load
    populateToYearDropdown();

    // Set a default selected option for #yearto
    // $('#yearto').append('<option value="" selected>Choose Year</option>');

    // Attach the change event to #year dropdown
    $('#year').change(function () {
        // Call the function to repopulate #yearto dropdown when #year changes
        populateToYearDropdown();
    });
});

function printContent(printMap1) {
    // Get the content of the element to be printed
    var printContents = document.getElementById(printMap1).innerHTML;

    // Additional text to be added
    let state = $('#state').val();
    let year = $('#year').val();
    let formType = $('#formType').val();
    let DiseasesSyndromes = $('#diseasesSyndromes').val();

    // Check if state is not null before adding to additional text
    var additionalText = "";
    if (state !== null) {
        additionalText = `
            <ul style="position: absolute; top: 50px; right: 50px;">
                <li><b> State - </b> ${state}  </li>
                <li><b> Year -</b> ${year} </li>
                <li><b> Form Type -</b> ${formType} </li>
                <li><b> Diseases Syndromes -</b> ${DiseasesSyndromes} </li>
            </ul>
        `;
    } else {
        additionalText = `
            <ul style="position: absolute; top: 50px; right: 50px;">
                <li><b> Year -</b> ${year} </li>
                <li><b> Form Type </b> ${formType} </li>
                <li><b> Diseases Syndromes -</b> ${DiseasesSyndromes} </li>
            </ul>
        `;
    }

    // Combine the additional text with the original content
    printContents += additionalText;

    // Save the current content of the body
    var originalContents = document.body.innerHTML;

    // Set the body content to the content to be printed
    document.body.innerHTML = printContents;

    // Print the content
    window.print();

    // Restore the original content of the body
    document.body.innerHTML = originalContents;
}


// laboratory dashboard
$(document).ready(function () {
    defaultLaboratoryMapData();
});

const defaultLaboratoryMapData = () => {
    year = $('#year').val();    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let sessionValue = $("#session_value").val();
    if (!sessionValue) {
        sessionValue = 0
    }
    $.ajax({
        url: BASE_URL + "/get-filter-laboratory-data",
        type: "get",
        success: function (result) {
            (async () => {
                const topology = await fetch(
                    'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                ).then(response => response.json());                
                const statesData = result.finalMapData;
                const arr = [];
                statesData.forEach((item)=>{
                    arr.push({"hc-key":item.state,value:item.numberReceived,extraValue:item.institute?item.institute:'N/A',extraValue2:item.institute_id})
                })
                const tableBody = $('.laboratoryDetailsDatas tbody');
                // Clear any existing rows in the table
                tableBody.empty();
                $('#laboratoryDetailsData').hide();                
                // Loop through the entries and add rows to the table
                statesData.forEach(function (entry) {                    
                    const institute = entry.institute;
                    const testSampleRecevied = entry.numberReceived;
                    const numberPatients = entry.numberPatients;
                    const numberTestConducted = entry.numberTestConducted;
                    const numberPositives = entry.numberPositives;
                    const mapRow = `
                      <tr>
                        <td>${capitalizeFirstLetter(institute)}</td>
                        <td>${sessionValue == 0 ? testSampleRecevied : 0}</td>
                      </tr>
                    `;
                    $("#tableBody").append(mapRow);           
                });
                // Graph total row table         
                    const graphTableRow = `
                    <tr>
                    <td>${result.total_records.number_of_patients}</td>
                    <td>${result.total_records.numbers_of_sample_received}</td>
                    <td>${result.total_records.testConducted}</td>
                    <td>${result.total_records.numbers_of_positives}</td>
                    </tr>
                    <tr>
                    <td>${result.total_records.number_of_patients/result.total_records.number_of_patients*100}%</td>
                    <td>${Math.trunc(result.total_records.numbers_of_sample_received/result.total_records.number_of_patients*100)}%</td>
                    <td>${Math.trunc(result.total_records.testConducted/result.total_records.number_of_patients*100)}%</td>
                    <td>${Math.trunc(result.total_records.numbers_of_positives/result.total_records.number_of_patients*100)}%</td>
                    </tr>
                    `;
                $("#tableGraphBody").append(graphTableRow);
                const gaugeOptions = {
                    chart: {
                        type: 'solidgauge',
                        height: '100%'
                    },
                    title: null,
                    pane: {
                        center: ['50%', '65%'],
                        size: '100%',
                        startAngle: -90,
                        endAngle: 90,
                        background: {
                            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                            innerRadius: '60%',
                            outerRadius: '100%',
                            shape: 'arc'
                        }
                    },
                    exporting: {
                        enabled: false
                    },
                    tooltip: {
                        enabled: false
                    },
                    yAxis: {
                        stops: [
                            [0.1, '#55BF3B'], // green
                            [0.5, '#DDDF0D'], // yellow
                            [0.9, '#DF5353'] // red
                        ],
                        lineWidth: 0,
                        tickWidth: 0,
                        minorTickInterval: null,
                        tickAmount: 2,
                        title: {
                            y: window.innerWidth <= 1400 ? -65 : (window.innerWidth >= 1550 ? -110 : -90)
                        },                        
                        labels: {
                            // y: 16
                        }
                    },
                    plotOptions: {
                        solidgauge: {
                            dataLabels: {
                                y: 5,
                                borderWidth: 0,
                                useHTML: true
                            }
                        }
                    }
                };
            
                // The speed gauge
                const chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Number Of Sample Received</h3>',
                            
                        }
                    },
                    series: [{
                        name: 'Number Of Sample Received',
                        data: [Math.trunc(result.total_records.numbers_of_sample_received/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                '<div style="text-align:center">' +
                                '<span style="font-size:20px">{y}%</span><br/>' +
                                '</div>'
                        },                       
                    }]
                }));
            
                // The sample pie chart
                const chartRpm = Highcharts.chart('container-rpm', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Number Of Test Conducted</h3>',
                           
                        }
                    },
                    series: [{
                        name: 'Number Of Test Conducted',
                        data: [Math.trunc(result.total_records.testConducted/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                `<div style="text-align:center">
                                <span style="font-size:25px">${Math.trunc(result.total_records.testConducted/result.total_records.number_of_patients*100)}%<br/>
                                </div>`,
                          
                        },
                    }]
                }));
                
            
                // The RPM gauge - First
                const chartRpmFirst = Highcharts.chart('container-rpm-first', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Total Number Of Positives</h3>'
                        }
                    },
                    series: [{
                        name: 'Total Number Of Positives',
                        data: [Math.trunc(result.total_records.numbers_of_positives/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                `<div style="text-align:center">
                                <span style="font-size:25px">${Math.trunc(result.total_records.numbers_of_positives/result.total_records.number_of_patients*100)}%<br/>
                                </div>`,
                        },
                        tooltip: {
                            valueSuffix: 'Days'
                        }
                    }]
                }));
            
                // The RPM gauge - Second
                const chartRpmSecond = Highcharts.chart('container-rpm-second', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Number Entered into IHIP</h3>'
                        }
                    },
                    series: [{
                        name: 'Number Entered into IHIP',
                        data: [Math.trunc(result.total_records.numbers_of_intered_ihip/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                `<div style="text-align:center">
                                <span style="font-size:25px">${Math.trunc(result.total_records.numbers_of_intered_ihip/result.total_records.number_of_patients*100)}%<br/>
                                </div>`,
                        },
                        tooltip: {
                            valueSuffix: 'Days'
                        }
                    }]
                }));
                // yearReport
                const chart = Highcharts.chart('yearReport', {
                    title: {
                        text: 'Institute wise Yearly data',
                        align: 'left'
                    },
                    subtitle: {
                        text: '',
                        align: 'left'
                    },
                    colors: [
                        '#4caefe',
                        '#3fbdf3',
                        '#35c3e8',
                        '#2bc9dc',
                        '#20cfe1',
                        '#16d4e6',
                        '#0dd9db',
                        '#03dfd0',
                        '#00e4c5',
                        '#00e9ba',
                        '#00eeaf',
                        '#23e274'
                    ],
                    xAxis: {
                        categories: result.graphFilterData.monthName,
                    },
                    series: [{
                        type: 'column',
                        name: 'Rabies data',
                        borderRadius: 5,
                        colorByPoint: true,
                        data: result.graphFilterData.record,
                        showInLegend: false
                    }]
                });
                // monthlyReport
                Highcharts.chart('monthlyReport', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Institute wise Monthly data'
                    },
                    xAxis: {
                        categories: [
                            'Current',
                            'Due Date',
                            'Rabies'
                        ]
                    },
                    yAxis: [{
                        min: 0,
                        title: {
                            text: 'Ravies Received'
                        }
                    }, {
                        title: {
                            text: 'Total Conducted'
                        },
                        opposite: true
                    }],
                    legend: {
                        shadow: false
                    },
                    tooltip: {
                        shared: true
                    },
                    plotOptions: {
                        column: {
                            grouping: false,
                            shadow: false,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Patients',
                        color: 'rgba(165,170,217,1)',
                        data: [150, 73, 20],
                        pointPadding: 0.3,
                        pointPlacement: -0.2
                    }, {
                        name: 'Sample Received',
                        color: 'rgba(126,86,134,.9)',
                        data: [140, 90, 40],
                        pointPadding: 0.4,
                        pointPlacement: -0.2
                    }, {
                        name: 'Test Conducted',
                        color: 'rgba(248,161,63,1)',
                        data: [183.6, 178.8, 198.5],
                        tooltip: {
                            valuePrefix: '$',
                            valueSuffix: ' M'
                        },
                        pointPadding: 0.3,
                        pointPlacement: 0.2,
                        yAxis: 1
                    }, {
                        name: 'Numbers of Positives',
                        color: 'rgba(186,60,61,.9)',
                        data: [203.6, 198.8, 208.5],
                        tooltip: {
                            valuePrefix: '$',
                            valueSuffix: ' M'
                        },
                        pointPadding: 0.4,
                        pointPlacement: 0.2,
                        yAxis: 1
                    }]
                });               
                // monthlysampleReport
                Highcharts.chart('monthlySampleReport', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Institute wise Patients / Sample Received'
                    },
                    subtitle: {
                        text: 'Source: ' +
                            'Sample Received'
                    },
                    xAxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yAxis: {
                        title: {
                            text: 'Institute wise Patients / Sample Received'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: 'Ravies',
                        data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
                            22.0, 17.8]
                    }, {
                        name: 'Sample Received',
                        data: [1,3,6,9,11,13,43,11,9]
                    }]
                });
                
                // map code 
                Highcharts.mapChart('laboratory-map', {
                    chart: {
                        map: topology,
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
                        min: 0,
                        max: 100,
                        minColor: '#fcad95',
                        maxColor: '#ab4024',
                        labels: {
                            format: '{value}',
                        },
                    },
                    plotOptions: {
                        series: {
                            events: {
                                click: function (e) {
                                    //  console.log(e.point.name)
                                    let nameState = e.point.name
                                    laboratory_apply_filter(e.point.extraValue2);
                                }
                            },
                            dataLabels: {
                                enabled: false,
                                format: '{point.value}' // Customize the format as needed
                            }
                        }
                    },
                    series: [{
                        data:arr,
                        name: '',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        states: {
                            select: {
                                color: '#fcad95'
                            }
                        },
                        tooltip: {
                            headerFormat: '',
                            pointFormat: '<b>{point.name}</b><br>' +
                                         'Value: {point.value}<br>' +
                                         'Institute Name: {point.extraValue}',
                            shared: true,
                            useHTML: true
                        }
                    }],              
                    
                    exporting: {
                        enabled: true,
                        buttons: {
                            contextButton: {
                                menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                            }
                        }
                    }
                });

            })();
        }
    });
}

$("#laboratory_apply_filter").on('click', function () {
    laboratory_apply_filter();
});
$("#laboratory_reset_button").on('click', function () {
    laboratoryResetButton()
});
const laboratory_apply_filter = (mapFilter = '') => {
    const filter_month = $('#month').find(":selected").val();
    const filter_institute = $('#institute').find(":selected").val();
    const filter_year = $('#year').find(":selected").val();    
    const session_value = $('#session_value').val();
    const search_btn = $("#laboratory_apply_filter");
    search_btn.attr("disabled", true);
    let loading_content = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...';
    search_btn.html(loading_content);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let sessionValue = $("#session_value").val();
    if (!sessionValue) {
        sessionValue = 0
    }
    $.ajax({
        url: BASE_URL + "/get-filter-laboratory-data",
        type: "get",
        data: {
            month: filter_month,
            year: filter_year,
            institute: filter_institute,
            mapFilter: mapFilter,
            session_value: session_value
        },
        success: function (result) {            
            search_btn.html("Search");
            search_btn.attr("disabled", false);
            search_btn.html("Search");
            search_btn.attr("disabled", false);            
            $('#rabiesbox1').html(result.total_records.number_of_patients);
            $('#rabiesbox2').html(result.total_records.numbers_of_sample_received);
            $('#rabiesbox3').html(result.total_records.numbers_of_positives);
            $('#rabiesbox4').html(result.total_records.numbers_of_intered_ihip);
            $('#text1').html("Syndromic Surveillance Cases");
            $('#text2').html("Syndromic Surveillance Cases");            
            (async () => {
                const topology = await fetch(
                    'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                ).then(response => response.json());                
                const statesData = result.finalMapData;
                const arr = [];
                statesData.forEach((item)=>{
                    arr.push({"hc-key":item.state,value:item.numberReceived,extraValue:item.institute?item.institute:'N/A',extraValue2:item.institute_id})
                })
                const tableBody = $('.laboratoryDetailsDatas tbody');
                // Clear any existing rows in the table
                tableBody.empty();
                $('#laboratoryDetailsData').hide();                
                // Loop through the entries and add rows to the table
                statesData.forEach(function (entry) {                    
                    const institute = entry.institute;
                    const testSampleRecevied = entry.numberReceived;
                    const numberPatients = entry.numberPatients;
                    const numberTestConducted = entry.numberTestConducted;
                    const numberPositives = entry.numberPositives;
                    const mapRow = `
                      <tr>
                        <td>${capitalizeFirstLetter(institute)}</td>
                        <td>${sessionValue == 0 ? testSampleRecevied : 0}</td>
                      </tr>
                    `;
                    $("#tableBody").append(mapRow);
                });
                // Graph total row table         
                const graphTableRow = `
                    <tr>
                    <td>${result.total_records.number_of_patients}</td>
                    <td>${result.total_records.numbers_of_sample_received}</td>
                    <td>${result.total_records.testConducted}</td>
                    <td>${result.total_records.numbers_of_positives}</td>
                    </tr>
                    <tr>
                    <td>${result.total_records.number_of_patients/result.total_records.number_of_patients*100}%</td>
                    <td>${Math.trunc(result.total_records.numbers_of_sample_received/result.total_records.number_of_patients*100)}%</td>
                    <td>${Math.trunc(result.total_records.testConducted/result.total_records.number_of_patients*100)}%</td>
                    <td>${Math.trunc(result.total_records.numbers_of_positives/result.total_records.number_of_patients*100)}%</td>
                    </tr>
                    `;
                $("#tableGraphBody").append(graphTableRow);
                const gaugeOptions = {
                    chart: {
                        type: 'solidgauge',
                        height: '100%'
                    },
                    title: null,
                    pane: {
                        center: ['50%', '65%'],
                        size: '100%',
                        startAngle: -90,
                        endAngle: 90,
                        background: {
                            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
                            innerRadius: '60%',
                            outerRadius: '100%',
                            shape: 'arc'
                        }
                    },
                    exporting: {
                        enabled: false
                    },
                    tooltip: {
                        enabled: false
                    },
                    yAxis: {
                        stops: [
                            [0.1, '#55BF3B'], // green
                            [0.5, '#DDDF0D'], // yellow
                            [0.9, '#DF5353'] // red
                        ],
                        lineWidth: 0,
                        tickWidth: 0,
                        minorTickInterval: null,
                        tickAmount: 2,
                        title: {
                            y: -65
                        },
                        labels: {
                            // y: 16
                        }
                    },
                    plotOptions: {
                        solidgauge: {
                            dataLabels: {
                                y: 5,
                                borderWidth: 0,
                                useHTML: true
                            }
                        }
                    }
                };
            
                // The speed gauge
                const chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Number Of Sample Received</h3>',
                            
                        }
                    },
                    series: [{
                        name: 'Number Of Sample Received',
                        data: [Math.trunc(result.total_records.numbers_of_sample_received/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                '<div style="text-align:center">' +
                                '<span style="font-size:20px">{y}%</span><br/>' +
                                '</div>'
                        },                       
                    }]
                }));
            
                // The sample pie chart
                const chartRpm = Highcharts.chart('container-rpm', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Number Of Test Conducted</h3>',
                           
                        }
                    },
                    series: [{
                        name: 'Number Of Test Conducted',
                        data: [Math.trunc(result.total_records.testConducted/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                `<div style="text-align:center">
                                <span style="font-size:25px">${Math.trunc(result.total_records.testConducted/result.total_records.number_of_patients*100)}%<br/>
                                </div>`,
                          
                        },
                    }]
                }));
                
            
                // The RPM gauge - First
                const chartRpmFirst = Highcharts.chart('container-rpm-first', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Total Number Of Positives</h3>'
                        }
                    },
                    series: [{
                        name: 'Total Number Of Positives',
                        data: [Math.trunc(result.total_records.numbers_of_positives/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                `<div style="text-align:center">
                                <span style="font-size:25px">${Math.trunc(result.total_records.numbers_of_positives/result.total_records.number_of_patients*100)}%<br/>
                                </div>`,
                        },
                        tooltip: {
                            valueSuffix: 'Days'
                        }
                    }]
                }));
            
                // The RPM gauge - Second
                const chartRpmSecond = Highcharts.chart('container-rpm-second', Highcharts.merge(gaugeOptions, {
                    yAxis: {
                        min: 0,
                        max: 100,
                        title: {
                            text: '<h3 class="highChartTitle" style="font-size:12px">Number Entered into IHIP</h3>'
                        }
                    },
                    series: [{
                        name: 'Number Entered into IHIP',
                        data: [Math.trunc(result.total_records.numbers_of_intered_ihip/result.total_records.number_of_patients*100)],
                        dataLabels: {
                            format:
                                `<div style="text-align:center">
                                <span style="font-size:25px">${Math.trunc(result.total_records.numbers_of_intered_ihip/result.total_records.number_of_patients*100)}%<br/>
                                </div>`,
                        },
                        tooltip: {
                            valueSuffix: 'Days'
                        }
                    }]
                }));
                // yearReport
                const chart = Highcharts.chart('yearReport', {
                    title: {
                        text: 'Institute wise Yearly data',
                        align: 'left'
                    },
                    subtitle: {
                        text: '',
                        align: 'left'
                    },
                    colors: [
                        '#4caefe',
                        '#3fbdf3',
                        '#35c3e8',
                        '#2bc9dc',
                        '#20cfe1',
                        '#16d4e6',
                        '#0dd9db',
                        '#03dfd0',
                        '#00e4c5',
                        '#00e9ba',
                        '#00eeaf',
                        '#23e274'
                    ],
                    xAxis: {
                        categories: result.graphFilterData.monthName,
                    },
                    series: [{
                        type: 'column',
                        name: 'Rabies data',
                        borderRadius: 5,
                        colorByPoint: true,
                        data: result.graphFilterData.record,
                        showInLegend: false
                    }]
                });
                // map chart
                Highcharts.mapChart('laboratory-map', {
                    chart: {
                        map: topology,
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
                        min: 0,
                        max: 100,
                        minColor: '#fcad95',
                        maxColor: '#ab4024',
                        labels: {
                            format: '{value}',
                        },
                    },
                    plotOptions: {
                        series: {
                            events: {
                                click: function (e) {
                                    //  console.log(e.point)
                                    let nameState = e.point.name
                                    laboratory_apply_filter(e.point.extraValue2);
                                }
                            },
                            dataLabels: {
                                enabled: false,
                                format: '{point.value}' // Customize the format as needed
                            }
                        }
                    },
                    series: [{
                        data:arr,
                        name: '',
                        allowPointSelect: true,
                        cursor: 'pointer',
                        states: {
                            select: {
                                color: '#fcad95'
                            }
                        },
                        tooltip: {
                            headerFormat: '',
                            pointFormat: '<b>{point.name}</b><br>' +
                                         'Value: {point.value}<br>' +
                                         'Institute Name: {point.extraValue}',
                            shared: true,
                            useHTML: true
                        }
                    }],
                    exporting: {
                        enabled: true,
                        buttons: {
                            contextButton: {
                                menuItems: ['printChart', 'separator', 'downloadPNG', 'downloadJPEG', 'downloadPDF', 'downloadSVG']
                            }
                        }
                    }
                });

            })();
        },
        error: (xhr, status) => {
            search_btn.html("Search");
            search_btn.attr("disabled", false);
        }
    });
}
function laboratoryResetButton() {
    $('#month option[value=""]').prop('selected', 'selected').change();
    $('#year option[value=""]').prop('selected', 'selected').change();
    $('#institute option[value=""]').prop('selected', 'selected').change();
    const search_btn = $("#laboratory_apply_filter");
    search_btn.attr("disabled", false);
    let loading_content = 'Search';
    search_btn.html(loading_content);   
    defaultLaboratoryMapData();
    laboratory_apply_filter();
}
// end LAboratory dashboard

