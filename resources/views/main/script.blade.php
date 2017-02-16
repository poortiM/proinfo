<script src="{{url('assets/js/jquery.min.js')}}"></script>
<!-- <script src="{{url('assets/js/verify.js')}}"></script> -->
<script src="{{url('assets/js/init.js')}}"></script>
<script src="{{url('assets/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
<script src="{{asset('assets/js/map.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/libraries/colorbox/jquery.colorbox-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libraries/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/libraries/flot/jquery.flot.spline.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfBnppbA91cdZgrQd3JWzOAimW6ufJGwo&signed_in=true&libraries=places&region=au" async defer></script>
<script type="text/javascript" src="{{asset('assets/libraries/bootstrap-fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/js/superlist.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/autocomplete/jquery.autocomplete.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/autocomplete/jquery.mockjax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/autocomplete/countries.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.auto-home-complete.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/blueimp-helper.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/blueimp-gallery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.blueimp-gallery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/cropper/cropper.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/cropper/main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/cropper/cover.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.cropit.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/ifvisible.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/timeme.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/Am2_SimpleSlider.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.form.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/project_script.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/product_script.js')}}"></script>

@php
$url = url('web/searchAlgo');
$url_smart_search = url('web/searchtype/searchWithVendor');

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);
@endphp

<script>
var dataTag = {
  <?php $count = 1; ?>
  @foreach( App::make('App\Http\Controllers\MainController')->get_tags()  as $value)
    "{{$count++}}": "<?php echo html_entity_decode($value->subcategory); ?>",
  @endforeach
}

$(function(){
  // toastr.success('We do have the Kapua suite available.', 'Success Alert', {timeOut: 5000})
  @if(!empty($openMsg))
    @if($openMsg == 1)
      $('#contactVendor').modal('show');
    @endif
  @endif

  @if(!empty(Request::get('claimProfile')))
    @if(Request::get('claimProfile') == true)
      {{App::make('App\Http\Controllers\MainController')->claimModal(Request::segment(2))}}
      $('#claimyourprofile').modal('show');
    @endif
  @endif
  
  $('#search-demo').autoComplete({
      minChars: 1,
      source: function(term, suggest){
          term = term.toLowerCase();
          var choices =
          [
              ['Air & Water Solutions','listing','category','1'], ['Architects','listing','category','2'], ['Art Gallery','listing','category','3'], ['Appliance Services (Repair/ Maintenance/Installation)','listing','category','4'], ['Bath','listing','category','5'], ['Blinds & Curtains','listing','category','6'], ['Blue Printing','listing','category','7'], ['Cleaning Services','listing','category','8'], ['Cupboards','listing','category','9'], ['Construction','listing','category','10'], ['Electricals','listing','category','11'], ['Fire Proofing','listing','category','12'], ['Flooring','listing','category','13'], ['Furniture','listing','category','14'], ['Glass Fitting','listing','category','15'], ['Home Automation','listing','category','16'], ['Design Solutions','listing','category','17'], ['Installation Services','listing','category','18'], ['Insulation','listing','category','19'], ['Logistics','listing','category','20'], ['Lighting','listing','category','21'], ['Kitchen','listing','category','22'], ['Music','listing','category','23'], ['Animal Control','listing','category','24'], ['Remodeling Solutions','listing','category','25'], ['Repair & Maintenance','listing','category','26'], ['Restoration','listing','category','27'], ['Roofing','listing','category','28'], ['Security','listing','category','29'], ['Sound/ AV Engineering','listing','category','30'], ['Home Accessories','listing','category','31'], ['Painting','listing','category','32'], ['Water Proofing','listing','category','33'], ['Wiring','listing','category','34'], ['Windows','listing','category','35'], ['Sewer Services','listing','category','36'], ['Gardening/ Plantation','listing','category','37'], ['Air Conditioning Installation','listing','subcategory','1'], ['Air Conditioning Repair & Maintenance Services','listing','subcategory','2'], ['Air Duct Cleaning','listing','subcategory','3'], ['Air & Water Systems Balancing','listing','subcategory','4'], ['Basement Waterproofing','listing','subcategory','5'], ['Attic Ventilation','listing','subcategory','6'], ['Heating System Design','listing','subcategory','7'], ['Irrigation','listing','subcategory','8'], ['Irrigation System Design & Installation Services','listing','subcategory','9'], ['Architectural Restoration','listing','subcategory','10'], ['Architecture','listing','subcategory','11'], ['Green Design','listing','subcategory','12'], ['Heating System Design','listing','subcategory','13'], ['New Home Design','listing','subcategory','14'], ['Patio Design','listing','subcategory','15'], ['Art Hangings','listing','subcategory','16'], ['Air Conditioning Installation','listing','subcategory','17'], ['Appliances Installation','listing','subcategory','18'], ['Audio Installation','listing','subcategory','19'], ['Visual Installation','listing','subcategory','20'], ['Appliance Repair & Maintenance','listing','subcategory','21'], ['Backup Generator Installation','listing','subcategory','22'], ['Bathroom Design','listing','subcategory','23'], ['Bathtub Installation','listing','subcategory','24'], ['Bathtub Liner Installation','listing','subcategory','25'], ['Bathtub Refinishing','listing','subcategory','26'], ['Bathtub Repair','listing','subcategory','27'], ['Blinds Installation','listing','subcategory','28'], ['Blinds Cleaning','listing','subcategory','29'], ['Curtain Installation','listing','subcategory','30'], ['Blue Printing','listing','subcategory','31'], ['Area Rug Cleaning','listing','subcategory','32'], ['Biohazard Remediation','listing','subcategory','33'], ['Blinds Cleaning','listing','subcategory','34'], ['Brick Cleaning','listing','subcategory','35'], ['Carpet Cleaning','listing','subcategory','36'], ['Clutter Removal','listing','subcategory','37'], ['Concrete Cleaning','listing','subcategory','38'], ['Contaminated Insulation Removal','listing','subcategory','39'], ['Deicing ','listing','subcategory','40'], ['Deck Cleaning','listing','subcategory','41'], ['Drain Cleaning','listing','subcategory','42'], ['Drapery Cleaning','listing','subcategory','43'], ['Dryer Vent Cleaning','listing','subcategory','44'], ['Window Cleaning','listing','subcategory','45'], ['House Cleaning','listing','subcategory','46'], ['Junk Removal','listing','subcategory','47'], ['Floor Cleaning','listing','subcategory','48'], ['Floor Removal','listing','subcategory','49'], ['Central vaccum service','listing','subcategory','50'], ['Chimney Cleaning','listing','subcategory','51'], ['Fireplace Cleaning','listing','subcategory','52'], ['Tree Removal','listing','subcategory','53'], ['Wallpaper Removal','listing','subcategory','54'], ['Vent & Duct Cleaning','listing','subcategory','55'], ['Move Out Cleaning','listing','subcategory','56'], ['Mattress Cleaning','listing','subcategory','57'], ['Mold Removal','listing','subcategory','58'], ['Lead Removal','listing','subcategory','59'], ['Upholstery Cleaning','listing','subcategory','60'], ['Vaccuming','listing','subcategory','61'], ['Stump Removal','listing','subcategory','62'], ['Roof Cleaning','listing','subcategory','63'], ['Rot Removal & Repair','listing','subcategory','64'], ['Paint Removal','listing','subcategory','65'], ['Snow Removal','listing','subcategory','66'], ['Spring Cleaning','listing','subcategory','67'], ['Steam Cleaning','listing','subcategory','68'], ['Popcorn Ceiling Removal','listing','subcategory','69'], ['Modular Cupboards','listing','subcategory','70'], ['Custom Cupboards','listing','subcategory','71'], ['Pre-Built Cupboards','listing','subcategory','73'], ['Elevator','listing','subcategory','74'], ['Accessibility Construction','listing','subcategory','75'], ['Acoustrical Construction','listing','subcategory','76'], ['Apartment Building Construction','listing','subcategory','77'], ['Barn Construction','listing','subcategory','78'], ['Green Design','listing','subcategory','80'], ['New Home Construction','listing','subcategory','81'], ['Fence Construction','listing','subcategory','82'], ['Outdoor Kitchen Design & Construction Services','listing','subcategory','83'], ['Aluminium Siding','listing','subcategory','84'], ['Asphalt Paving','listing','subcategory','85'], ['Asphalt Sealing','listing','subcategory','86'], ['Asphalt Shingle Roofing','listing','subcategory','87'], ['Brick & Stone Paving','listing','subcategory','88'], ['Brick Laying','listing','subcategory','89'], ['Building Addition','listing','subcategory','90'], ['Garage Construction','listing','subcategory','91'], ['Deck Construction','listing','subcategory','92'], ['Home Theater Construction','listing','subcategory','93'], ['Concrete','listing','subcategory','94'], ['Land Development','listing','subcategory','95'], ['Concrete Paving','listing','subcategory','96'], ['Landscape Construction','listing','subcategory','97'], ['Construction Project Management','listing','subcategory','98'], ['Custom Home Construction','listing','subcategory','99'], ['Story Addition','listing','subcategory','100'], ['Custom Stair Construction','listing','subcategory','101'], ['Town Home Construction','listing','subcategory','102'], ['Marble construction','listing','subcategory','103'], ['Cedar Siding','listing','subcategory','104'], ['Cement Finishing','listing','subcategory','105'], ['Ceramic Services','listing','subcategory','106'], ['Chimney construction','listing','subcategory','107'], ['Façade Construction','listing','subcategory','108'], ['Stucco Construction','listing','subcategory','109'], ['Sunroom Building','listing','subcategory','110'], ['Sunroom Construction','listing','subcategory','111'], ['Retaining Wall Construction','listing','subcategory','112'], ['New Roof Construction','listing','subcategory','113'], ['Outdoor Fireplace Construction','listing','subcategory','114'], ['Outdoor Storage Building','listing','subcategory','115'], ['Patio Construction','listing','subcategory','116'], ['Paving Services','listing','subcategory','117'], ['Themed Construction','listing','subcategory','118'], ['Sleeping Porch Construction','listing','subcategory','119'], ['Shoring Construction','listing','subcategory','120'], ['Playset Construction ','listing','subcategory','121'], ['Pool Enclosure Construction','listing','subcategory','122'], ['Porch Construction','listing','subcategory','123'], ['Residential Construction','listing','subcategory','124'], ['Shed Assembly','listing','subcategory','125'], ['Sidewalk & Patio Construction','listing','subcategory','126'], ['Steel & Iron Construction','listing','subcategory','127'], ['Electric Meter Installation','listing','subcategory','128'], ['Electric Power Equipment','listing','subcategory','129'], ['Sign Installation','listing','subcategory','130'], ['Electric Water Heater','listing','subcategory','131'], ['Electrical Inspection','listing','subcategory','132'], ['Electrical Panel Upgrade','listing','subcategory','133'], ['Electrical Repair','listing','subcategory','134'], ['Electrical Wiring','listing','subcategory','135'], ['Building Fireproofing','listing','subcategory','136'], ['Fireproofing','listing','subcategory','137'], ['Flooring Installation','listing','subcategory','138'], ['Carpets','listing','subcategory','139'], ['Carpet Repair','listing','subcategory','140'], ['Carpet Stretching','listing','subcategory','141'], ['Laminate & Vinyl Flooring','listing','subcategory','142'], ['Laminate Flooring','listing','subcategory','143'], ['Carpeting','listing','subcategory','144'], ['Floor Cleaning','listing','subcategory','145'], ['Cement Flooring','listing','subcategory','146'], ['Marble Construction','listing','subcategory','147'], ['Flooring ','listing','subcategory','148'], ['Flooring Refinishing','listing','subcategory','149'], ['Flooring Repair','listing','subcategory','150'], ['Sub Floor Installation','listing','subcategory','151'], ['Linoleum Flooring','listing','subcategory','152'], ['Tile & Grout Cleaning','listing','subcategory','153'], ['Tile Countertop','listing','subcategory','154'], ['Tile Flooring','listing','subcategory','155'], ['Tile Flooring installation','listing','subcategory','156'], ['Tile Refinishing','listing','subcategory','157'], ['Hardwood Flooring','listing','subcategory','158'], ['Tile Regrouting','listing','subcategory','159'], ['Tile Repair','listing','subcategory','160'], ['Tiling','listing','subcategory','161'], ['Custom Cabinatery','listing','subcategory','162'], ['Custom Furniture Building','listing','subcategory','163'], ['Custom Shelving','listing','subcategory','164'], ['Home Décor Furnishing','listing','subcategory','165'], ['Mirrors','listing','subcategory','166'], ['Furniture Assembly','listing','subcategory','167'], ['Furniture Moving','listing','subcategory','168'], ['Furniture Refinishing','listing','subcategory','169'], ['Furniture Repair','listing','subcategory','170'], ['Garage Door Opener Installation','listing','subcategory','171'], ['Garage Door Installation','listing','subcategory','172'], ['Garage Door Repair','listing','subcategory','173'], ['Door Balancing','listing','subcategory','174'], ['Door Installation','listing','subcategory','175'], ['Door Painting','listing','subcategory','176'], ['Door Repair','listing','subcategory','177'], ['Door Replacement','listing','subcategory','178'], ['Doors','listing','subcategory','179'], ['Garage Doors','listing','subcategory','180'], ['Building Glazing','listing','subcategory','181'], ['Glass Installation','listing','subcategory','182'], ['Glass Repair','listing','subcategory','183'], ['Home Automation Services','listing','subcategory','184'], ['Gas Appliance Connection','listing','subcategory','185'], ['Gas Burning Fireplace Installation','listing','subcategory','186'], ['Gas Heating','listing','subcategory','187'], ['Gas Leak Detection & Repair','listing','subcategory','188'], ['Gas Pipe Installation & Repair','listing','subcategory','189'], ['Gas Pipe Repair','listing','subcategory','190'], ['Bathroom Design','listing','subcategory','191'], ['Custom Closet Design','listing','subcategory','192'], ['Custom Dock Design','listing','subcategory','193'], ['Entertainment Room Design','listing','subcategory','194'], ['Design Build','listing','subcategory','195'], ['Entertainment Wall Design','listing','subcategory','196'], ['Garden Design','listing','subcategory','197'], ['New Home design','listing','subcategory','198'], ['Green Design','listing','subcategory','199'], ['Interior Designing','listing','subcategory','200'], ['Interior Design Consultation','listing','subcategory','201'], ['Interior Design Project Analysis','listing','subcategory','202'], ['Interior Design Project Budgeting','listing','subcategory','203'], ['Interior Design Project Purchasing & Procurement','listing','subcategory','204'], ['Kitchen Design & Planning','listing','subcategory','205'], ['Landscape & Design','listing','subcategory','206'], ['Outdoor Kitchen Design & Construction Services','listing','subcategory','207'], ['Patio Design','listing','subcategory','208'], ['Decorating','listing','subcategory','209'], ['Decorative Landscaping','listing','subcategory','210'], ['Sprinkler Design','listing','subcategory','211'], ['Stair Design Services','listing','subcategory','212'], ['Awnings Installation','listing','subcategory','213'], ['Backflow Preventer Installation','listing','subcategory','214'], ['Backsplash Installation','listing','subcategory','215'], ['Baluster Installation','listing','subcategory','216'], ['Baseboard Moulding Installation','listing','subcategory','217'], ['Blinds Installation','listing','subcategory','218'], ['Boiler Installation','listing','subcategory','219'], ['Driveway Installation','listing','subcategory','220'], ['Flooring Installation','listing','subcategory','221'], ['Carpet Installation','listing','subcategory','222'], ['Circuit Braker Installation','listing','subcategory','223'], ['Closet Storage Installation','listing','subcategory','224'], ['Countertop Installation','listing','subcategory','225'], ['Crown Molding Installation','listing','subcategory','226'], ['Curtain Installation','listing','subcategory','227'], ['Drainage Installation','listing','subcategory','228'], ['Drapery Installation','listing','subcategory','229'], ['Driveway Gate Installation','listing','subcategory','230'], ['Dryer Vent Installation','listing','subcategory','231'], ['Drywall Installation','listing','subcategory','232'], ['Ductwork Installation','listing','subcategory','233'], ['EV Charging Station Installation','listing','subcategory','234'], ['Home Theater Installation','listing','subcategory','235'], ['Humidifier Installation','listing','subcategory','236'], ['Hurricane & Storm Window Installation','listing','subcategory','237'], ['Hurricane Shutter Installation','listing','subcategory','238'], ['Carport Installation','listing','subcategory','239'], ['Chimney Liner Repair & Installation','listing','subcategory','240'], ['Faucets & Plumbing Fixtures Installation','listing','subcategory','241'], ['Fire Pit Installation','listing','subcategory','242'], ['Fireplace Installation','listing','subcategory','243'], ['Vinyl Flooring Installation','listing','subcategory','244'], ['Line Installation','listing','subcategory','245'], ['Exhaust Fan Installation','listing','subcategory','246'], ['Furnace Installation','listing','subcategory','247'], ['Garage Door Installation','listing','subcategory','248'], ['Garage Door Opener Installation','listing','subcategory','249'], ['Storm Shelter Installation','listing','subcategory','250'], ['Sub Floor Installation','listing','subcategory','251'], ['Subpanel Installation & Repair','listing','subcategory','252'], ['Sump Pump Installation & Repair','listing','subcategory','253'], ['Roof flashing Installation & Repair','listing','subcategory','254'], ['Sanitary Piping Installation','listing','subcategory','255'], ['Screen Installation','listing','subcategory','256'], ['Outlet Installation & Repair','listing','subcategory','257'], ['Pavers Installation','listing','subcategory','258'], ['Sprinkler Installation','listing','subcategory','259'], ['Heat Pump installation & Repair','listing','subcategory','260'], ['Generator Installation','listing','subcategory','261'], ['Blown-In-Insulation','listing','subcategory','262'], ['Contaminated Insulation Removal','listing','subcategory','263'], ['Duct Insulation','listing','subcategory','264'], ['Ductless HVAC Installation & Repair','listing','subcategory','265'], ['Insulation Contracting','listing','subcategory','266'], ['Wall Insulation','listing','subcategory','267'], ['Appliance Moving','listing','subcategory','268'], ['Lighting Design','listing','subcategory','269'], ['Deck Lighting','listing','subcategory','270'], ['Energy Efficiency Lighting','listing','subcategory','271'], ['Holiday Lighting','listing','subcategory','272'], ['Landscape Lighting','listing','subcategory','273'], ['Light Switch Installation & Repair','listing','subcategory','274'], ['Lighting Fixture Installation','listing','subcategory','275'], ['Lighting Fixture Repair','listing','subcategory','276'], ['Lighting Retrofit','listing','subcategory','277'], ['Exterior Lighting','listing','subcategory','278'], ['Outdoor Lighting','listing','subcategory','279'], ['Recessed Lighting','listing','subcategory','280'], ['Kitchen Design & Planning','listing','subcategory','281'], ['Outdoor Kitchen Design','listing','subcategory','282'], ['Boiler Installation','listing','subcategory','283'], ['Boiler Repair','listing','subcategory','284'], ['Kitchen Tiles','listing','subcategory','285'], ['Exhaust Fan Installation','listing','subcategory','286'], ['Oven Repair','listing','subcategory','287'], ['Music Engineering','listing','subcategory','288'], ['Sound/ AV Engineering','listing','subcategory','289'], ['Home Theater','listing','subcategory','290'], ['Animal Abatement','listing','subcategory','291'], ['Animal Disposal','listing','subcategory','292'], ['Animal Proofing','listing','subcategory','293'], ['Animal Removal','listing','subcategory','294'], ['Animal Trapping','listing','subcategory','295'], ['Ant Control','listing','subcategory','296'], ['Bat Removal','listing','subcategory','297'], ['Asbestos Abatement','listing','subcategory','298'], ['Spider Control','listing','subcategory','299'], ['Asbestos Removal','listing','subcategory','300'], ['Asbestos Inspection','listing','subcategory','301'], ['Bedbug Treatment','listing','subcategory','302'], ['Bind Removal','listing','subcategory','303'], ['Bug Spraying','listing','subcategory','304'], ['Insects Control','listing','subcategory','305'], ['Attic Renovation','listing','subcategory','306'], ['Basement Renovation','listing','subcategory','307'], ['Bathroom Renovation','listing','subcategory','308'], ['Bedroom Renovation','listing','subcategory','309'], ['Exterior Renovation','listing','subcategory','310'], ['Garage Renovation','listing','subcategory','311'], ['Green Construction & Renovation ','listing','subcategory','312'], ['Interior Renovation','listing','subcategory','313'], ['Kitchen Renovation','listing','subcategory','314'], ['Custom Door Fabrication','listing','subcategory','316'], ['Façade Renovation','listing','subcategory','317'], ['Structural Alterations','listing','subcategory','318'], ['Renovation','listing','subcategory','319'], ['Asphalt Repair','listing','subcategory','320'], ['Asphalt Shingle Roofing Repair','listing','subcategory','321'], ['Awnings Repair','listing','subcategory','322'], ['Bathtub Repair','listing','subcategory','323'], ['Boiler Repair','listing','subcategory','324'], ['Circuit Braker Repair','listing','subcategory','325'], ['Concrete Repair','listing','subcategory','326'], ['Countertop Refinishing','listing','subcategory','327'], ['Chimney Liner Repair & Installation','listing','subcategory','328'], ['Concrete Refinishing','listing','subcategory','329'], ['Countertop Repair','listing','subcategory','330'], ['Deck Maintenance','listing','subcategory','331'], ['Deck Refinishing','listing','subcategory','332'], ['Driveway Gate Maintenance & Repair','listing','subcategory','333'], ['Drywall Repair','listing','subcategory','334'], ['Elevator Repair Maintenance','listing','subcategory','335'], ['Carpet Repair','listing','subcategory','336'], ['Fireplace Repair','listing','subcategory','337'], ['Landscape Maintenance','listing','subcategory','338'], ['TV Repair','listing','subcategory','339'], ['TV Installation','listing','subcategory','340'], ['Fence Repair','listing','subcategory','341'], ['Caulking','listing','subcategory','342'], ['Chimney Repair','listing','subcategory','343'], ['Deck Repair','listing','subcategory','344'], ['Masonry Maintenance','listing','subcategory','345'], ['Foundation Repair','listing','subcategory','346'], ['Frozen Pipe Repair','listing','subcategory','347'], ['Fuse Box Repair','listing','subcategory','348'], ['Garage Door repair','listing','subcategory','349'], ['Subpanel Installation & Repair','listing','subcategory','350'], ['Sump Pump Installation & Repair','listing','subcategory','351'], ['Roof Flashing Installation & Repair','listing','subcategory','352'], ['Outlet Installation & Repair','listing','subcategory','353'], ['Oven Repair','listing','subcategory','354'], ['Pavers Maintenance','listing','subcategory','355'], ['Plaster Repair','listing','subcategory','356'], ['Sprinkler Repair','listing','subcategory','357'], ['Shed Repair','listing','subcategory','358'], ['Repair Services','listing','subcategory','359'], ['Repair Brick or Stone','listing','subcategory','360'], ['Heat Pump Installation & Repair','listing','subcategory','361'], ['Generator Maintenance & Repair','listing','subcategory','362'], ['Attic Restoration','listing','subcategory','363'], ['Building Restoration Services','listing','subcategory','364'], ['Cabinet Restoration','listing','subcategory','365'], ['Stone Restoration','listing','subcategory','366'], ['Hipped Roofing','listing','subcategory','367'], ['Asphalt Shingle Roofing','listing','subcategory','368'], ['Cedar Shingle Roofing','listing','subcategory','369'], ['Flat Roofing','listing','subcategory','370'], ['Mansard Roofing','listing','subcategory','371'], ['Metal Roofing repair','listing','subcategory','372'], ['Metal roofing installation','listing','subcategory','373'], ['Metal Roofing','listing','subcategory','374'], ['Foam Roofing Installation','listing','subcategory','375'], ['Foam Roofing Repair','listing','subcategory','376'], ['Gable Roofing','listing','subcategory','377'], ['Gambrel Roofing','listing','subcategory','378'], ['Tar & Gravel Roofing Installation','listing','subcategory','379'], ['Tar & Gravel Roofing Repair','listing','subcategory','380'], ['Roofing Inspection','listing','subcategory','381'], ['Roofing Repair','listing','subcategory','382'], ['Roofing','listing','subcategory','383'], ['Rubber Roofing','listing','subcategory','384'], ['Tile Roofing','listing','subcategory','385'], ['Tile Roofing Installation','listing','subcategory','386'], ['Tile Roofing Repair','listing','subcategory','387'], ['Torch Down Roofing Installation','listing','subcategory','388'], ['Torch down Roofing Repair','listing','subcategory','389'], ['Torchdown Roofing','listing','subcategory','390'], ['Automatic Gates','listing','subcategory','391'], ['Home Safety Inspection','listing','subcategory','392'], ['Security Camera Installation','listing','subcategory','393'], ['Security Equipment Services','listing','subcategory','394'], ['Security Lighting','listing','subcategory','395'], ['Security systems Design & Installation','listing','subcategory','396'], ['Security systems Monitering','listing','subcategory','397'], ['Security Systems','listing','subcategory','398'], ['Fan Installation','listing','subcategory','399'], ['Fan Repair & Re-Build','listing','subcategory','400'], ['Custom Painting Finish','listing','subcategory','401'], ['Decorative Painting','listing','subcategory','402'], ['Deck staining & Painting services','listing','subcategory','403'], ['Exterior Painting','listing','subcategory','404'], ['Faux Painting','listing','subcategory','405'], ['Mural Painting','listing','subcategory','406'], ['Paint Removal','listing','subcategory','407'], ['Painting','listing','subcategory','408'], ['Texture Painting','listing','subcategory','409'], ['Building Waterproofing','listing','subcategory','410'], ['Waterproofing','listing','subcategory','411'], ['Roof Waterproofing','listing','subcategory','412'], ['Cable Installation','listing','subcategory','413'], ['Cable Wiring','listing','subcategory','414'], ['Wiring Replacement','listing','subcategory','415'], ['New home wiring','listing','subcategory','416'], ['Hurricane & Storm Window Installation','listing','subcategory','417'], ['Window Caulking','listing','subcategory','418'], ['Window Cleaning','listing','subcategory','419'], ['window contractor services','listing','subcategory','420'], ['Window Installation','listing','subcategory','421'], ['Window Repair & Maintenance','listing','subcategory','422'], ['Window Replacement','listing','subcategory','423'], ['Window Treatment Services','listing','subcategory','424'], ['Window Treatment Installation','listing','subcategory','425'], ['Single Window Replacement','listing','subcategory','426'], ['Septic & Sump-Pump Services','listing','subcategory','427'], ['Septic Tank Cleaning','listing','subcategory','428'], ['Septic tank Maintenance & Installation Services','listing','subcategory','429'], ['Septic Tank Repair','listing','subcategory','430'], ['Septic to Sewer Conversion','listing','subcategory','431'], ['Sewer & Drain Services','listing','subcategory','432'], ['Sewer & Utility Services','listing','subcategory','433'], ['Sewer Cleaning','listing','subcategory','434'], ['Sewer Main Installation','listing','subcategory','435'], ['Sewer Repair','listing','subcategory','436'], ['Gutter & Downspout repair','listing','subcategory','437'], ['Gutter Cleaning','listing','subcategory','438'], ['Gutter Cover Installation','listing','subcategory','439'], ['Gutter Installation & Repair','listing','subcategory','440'], ['Gutter Maintenance','listing','subcategory','441'], ['Gutter Screening','listing','subcategory','442'], ['Grass seeding','listing','subcategory','443'], ['Tree Planting','listing','subcategory','444'], ['Tree Bracing','listing','subcategory','445'], ['Tree Health Evaluations','listing','subcategory','446'], ['Tree Pruning','listing','subcategory','447'], ['Tree Removal','listing','subcategory','448'], ['Tree Services','listing','subcategory','449'], ['Tree Surveys','listing','subcategory','450'], ['Tree Trimming','listing','subcategory','451'], ['Landscaping','listing','subcategory','452'], ['Lawn & Yard Work','listing','subcategory','453'], ['Lawn Aeration','listing','subcategory','454'], ['Lawn Fertilization','listing','subcategory','455'], ['Lawn Irrigation Installation','listing','subcategory','456'], ['Lawn maintenance','listing','subcategory','457'], ['Lawn mover repair','listing','subcategory','458'], ['Lawn seeding','listing','subcategory','459'], ['Lawn Treatment','listing','subcategory','460'], ['Lawnmover Maintenance','listing','subcategory','461'], ['Garden Maintenance','listing','subcategory','462'], ['Gardening','listing','subcategory','463'], ['Fan Installation','listing','subcategory','464'], ['Fan Repair','listing','subcategory','465'], ['MAD DESIGN','profile','profile','12'], ['Kiran Interiors','profile','profile','31'], ['Decor Company ','profile','profile','37'], ['Architectural Direction','profile','profile','40'], ['AKDA','profile','profile','41'], ['interior designer in Noida','profile','profile','42'], ['innovation','profile','profile','43'], ['Decons A and I','profile','profile','44'], ['Kumar Moorthy & Associates','profile','profile','45'], ['AADC','profile','profile','46'], ['R SQUARE DEZIGN','profile','profile','47'], ['KayStudio','profile','profile','48'], ['plan loci','profile','profile','49'], ['RENESA ARCHITECTURE DESIGN INTERIORS','profile','profile','50'], ['OFIA (Office For International Architecture)','profile','profile','51'], ['Ashu Paul Associates','profile','profile','52'], ['Archvue Design Co.','profile','profile','53'], ['Design Forum International','profile','profile','54'], ['SAMBLANCE INTERIO','profile','profile','55'], ['Le Paradiz','profile','profile','56'], ['The Vrindavan Project','profile','profile','57'], ['Plan N Design','profile','profile','58'], ['DESIGN PLUS','profile','profile','59'], ['Mold Design Studio','profile','profile','60'], ['ApnaGhar','profile','profile','61'], ['I-dezine architects and designers','profile','profile','62'], ['GRAVITY DESIGN STUDIO','profile','profile','63'], ['SAIFI DESIGN','profile','profile','64'], ['Balaji Time Square','profile','profile','65'], ['Design Atelier','profile','profile','66'], ['Didans Studio','profile','profile','67'], ['Design Architecture Studio - Eclectic Space Design','profile','profile','68'], ['SPA DESIGN CONSULTANTS PVT. LTD.,','profile','profile','69'], ['Adi Designs','profile','profile','71'], ['Cucine Lube','profile','profile','72'], ['Bagnato Architects','profile','profile','73'], ['Co-lab Architecture','profile','profile','74'], ['Mihaly Slocombe','profile','profile','75'], ['Rebecca Naughtin Architect','profile','profile','76'], ['Adam Dettrick Architects','profile','profile','77'], ['Inbetween Architecture','profile','profile','78'], ['Angelucci Architects','profile','profile','79'], ['alsoCAN Architects','profile','profile','81'], ['My Architect','profile','profile','82'], ['Steve Rose Architect','profile','profile','83'], ['LSA Architects','profile','profile','84'], ['Architest Pty Ltd','profile','profile','85'], ['Quadrant Design Architects','profile','profile','86'], ['Gardiner Architects','profile','profile','87'], ['Aktis Pty Ltd','profile','profile','88'], ['Eco Edge Architecture + Interior Design','profile','profile','89'], ['4site melbourne','profile','profile','90'], ['Statkus Architecture Pty Ltd','profile','profile','91'], ['NORTHBOURNE Architecture + Design','profile','profile','92'], ['mcmahon and nerlich','profile','profile','93'], ['Nic Owen Architects','profile','profile','94'], ['','profile','profile','95'], ['','profile','profile','96'], ['PROJECT810','profile','profile','100'], ['Scavolini','profile','profile','101'], ['Shift Property Styling','profile','profile','103'], ['','profile','profile','108'], ['GIA Bathroom & Kitchen Renovations','profile','profile','109'], ['CplusC Architectural Workshop','profile','profile','110'], ['Zugai Strudwick Architects','profile','profile','111'], ['Dion Seminara Architecture','profile','profile','112'], ['Watershed Design','profile','profile','113'], ['Richard Cole Architecture','profile','profile','114'], ['Skyring Architects','profile','profile','116'], ['Rudolfsson Alliker Associates Architects','profile','profile','117'], ['Melocco and Moore Architects','profile','profile','119'], ['BKA Architecture Pty Ltd','profile','profile','122'], ['Kreis Grennan Architecture','profile','profile','123'], ['Neil Cownie Architect Pty Ltd','profile','profile','124'], ['Architecture Republic','profile','profile','125'], ['de.arch','profile','profile','126'], ['The Site Foreman','profile','profile','127'], ['Undercover Architect','profile','profile','128'], ['Astute Architectural Drafting','profile','profile','129'], ['Hobbs Jamieson Architecture','profile','profile','130'], ['Annabelle Chapman Architect Pty Ltd','profile','profile','131'], ['Walton Architects','profile','profile','132'], ['Ardent Architects','profile','profile','133'], ['Sanctum Design','profile','profile','134'], ['Blend Residential Designs','profile','profile','135'], ['Design Unity','profile','profile','136'], ['Yael K Designs','profile','profile','137'], ['Ben Trager Homes','profile','profile','138'], ['MacKinnon Design Pty Ltd','profile','profile','139'], ['Aboda Design Group','profile','profile','140'], ['David Wilkes Design','profile','profile','142'], ['darren grayson designers','profile','profile','143'], ['Dalecki Design','profile','profile','144'], ['Nest Residential Design Pty Ltd','profile','profile','145'], ['YKDesigns','profile','profile','146'], ['Urban Sensations','profile','profile','148'], ['Lewisham Interiors','profile','profile','149'], ['Ryan Young Design','profile','profile','150'], ['Danielle Scandrett Interiors','profile','profile','151'], ['The Kitchen Design Centre','profile','profile','152'], ['Urban Angles','profile','profile','153'], ['Manias Associates Building Designers','profile','profile','154'], ['Jasmine McClelland Design','profile','profile','155'], ['Key Piece','profile','profile','156'], ['Poly Studio','profile','profile','158'], ['Livingetc','profile','profile','159'], ['Camilla Molders Design','profile','profile','160'], ['Designs Australia','profile','profile','161'], ['Strong Ox','profile','profile','162'], ['Superdraft Pty. Ltd.','profile','profile','163'], ['iseekblinds.com.au','profile','profile','164'], ['Ed Ewers Architecture','profile','profile','165'], ['Mesh Design Projects','profile','profile','166'], ['Bask Interiors','profile','profile','167'], ['Soktas Handblown Glass Lighting','profile','profile','168'], ['Mint Lighting','profile','profile','169'], ['Neptune Swimming Pools','profile','profile','170'], ['Lavita Furniture','profile','profile','171'], ['Altereco Design','profile','profile','172'], ['Raw Drafting + Design','profile','profile','173'], ['Secret Design Studio','profile','profile','174'], ['Glow Design Group','profile','profile','175'], ['Grollo Homes','profile','profile','176'], ['Gruen Eco Design','profile','profile','177'], ['Anchor Homes','profile','profile','178'], ['Maxa Design','profile','profile','180'], ['Instyle Design','profile','profile','181'], ['Celcon Construction','profile','profile','182'], ['Leneeva Homes','profile','profile','183'], ['Peter Jackson Design','profile','profile','184'], ['Andrew Gifford Imagery','profile','profile','185'], ['dcf design group','profile','profile','186'], ['Reborn Projects','profile','profile','188'], ['Di Vinci Studio Bathrooms & Interiors','profile','profile','189'],
              <?php //echo file_get_contents($url, false, stream_context_create($arrContextOptions)); ?>
          ];
          var suggestions = [];
          for (i=0;i<choices.length;i++)
              if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
          suggest(suggestions);
      },
      renderItem: function (item, search){
          search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
          var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
          return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-category="'+item[2]+'" data-val="'+search+'" data-id="'+item[3]+'">'+item[0].replace(re, "<b>$1</b>")+'</div>';
      },
      onSelect: function(e, term, item){
          var category = item.data('langname');
          var id = item.data('id');

          var location;
          var retrievedCoordinates = localStorage.getItem("location");

          if(retrievedCoordinates!=null){
             location = retrievedCoordinates;
          }
          else{
            location = '';
          }

          $('#search-demo').val(item.data('langname'));
          @if(!empty(Request::get('location')))
          window.location="{{ url('/') }}/search?type="+item.data('lang')+"&element="+item.data('category')+"&keyword="+category+"&location={{Request::get('location')}}&sid="+id;
          @else
          window.location="{{ url('/') }}/search?type="+item.data('lang')+"&element="+item.data('category')+"&keyword="+category+"&location="+location+"&sid="+id;
          @endif
      }
  });

  $('#smart-search-demo').autoComplete({
      minChars: 1,
      source: function(term, suggest){
          term = term.toLowerCase();
          var choices =
          [
              ['AC provider','listing','category'], ['Architects','listing','category'], ['Art Gallery','listing','category'], ['Bathroom Fitting','listing','category'], ['Blinds And Curtains','listing','category'], ['Cupboards','listing','category'], ['Flooring Solution','listing','category'], ['Furniture providers','listing','category'], ['Glass Fitting','listing','category'], ['Home Automotation','listing','category'], ['Interior Design','listing','category'], ['Lighting Solution','listing','category'], ['Modular Kitchen','listing','category'], ['Music Engineer','listing','category'], ['Pest Control','listing','category'], ['Propisor Tiles Icon','listing','category'], ['Security','listing','category'], ['Strike','profile','profile'],
              <?php //echo file_get_contents($url_smart_search, false, stream_context_create($arrContextOptions)); ?>

          ];
          var suggestions = [];
          for (i=0;i<choices.length;i++)
              if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
          suggest(suggestions);
      },
      renderItem: function (item, search){
          search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
          var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
          return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-category="'+item[2]+'" data-val="'+search+'">'+item[0].replace(re, "<b>$1</b>")+'</div>';
      },
      onSelect: function(e, term, item){
          $(".percent").html("14% Complete");
          $(".question-complete-percent").css({"width":"14.28%"});

          $("#propertyType").removeClass('hide');
          var contactTopPosition = $("#propertyType").position().top;
          $(".questions").animate({scrollTop: contactTopPosition});

          $(".searchbutton").attr('category',item.data('langname'));
          // $("#smart-search-result").val(item.data('langname'));
          $('#smart-search-demo').val(item.data('langname'));
      }
  });

  'use strict';
  var countriesArray = $.map(dataTag, function (value, key) { return { value: value, data: key }; });

  $('#autocomplete-ajax').autocomplete({
      lookup: countriesArray,
      //lookup: countriesArray,

      onSelect: function(suggestion) {
          console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);

          $("#autocomplete-ajax").val('');

          var service = suggestion.value;
          var user_id = $("#user_id").val();
          var csrf = "{{ csrf_token() }}";
          var data = "service="+service+"&user_id="+user_id;

          $.ajax({
              type : "post",
              url: "{{ url('pro/ajax/services') }}",
              headers: {
                  'X-CSRF-Token': csrf ,
                  "Accept": "application/json"
              },
              data: data,
              dataType: 'json',
              success: function(res)
              {
                $(".vendor-services").html("");
                if ($('.servicelist').length > 0) {
                  $.each(res, function(index) {
                  });
                }

                $(".delete_service").click(function(){

                    var deleteid = $(this).attr("deleteid");
                    var csrf = "{{ csrf_token() }}";
                    var user_id = $("#user_id").val();

                    $(this).parents('button').fadeOut();

                    var data = "deleteid="+deleteid+"&user_id="+user_id;

                    $.ajax({
                        type : "post",
                        url: "{{ url('pro/ajax/serviceDelete') }}",
                        data : data,
                        headers: {
                                'X-CSRF-Token': csrf ,
                                "Accept": "application/json"
                            },
                        success: function(res)
                        {
                          //alert(res)
                        }
                    });
                });
              }
          });
      },
      onHint: function (hint) {
          $('#autocomplete-ajax-x').val(hint);
      },
      onInvalidateSelection: function() {
          $('#selction-ajax').html('You selected: none');
      }
  });

});
</script>

@if(Auth::guard('web')->check())

  @if(Request::segment(2) == 'analytics')
  <script type="text/javascript">
  $(function () {
      $('#container').highcharts({
          chart: {
              type: 'spline'
          },
          title: {
              text: 'Report'
          },
          subtitle: {
              text: ''
          },
          xAxis: {
              type: 'datetime',
              dateTimeLabelFormats: { // don't display the dummy year
                  month: '%b',
                  year: '%b'
              },
              title: {
                  text: 'Month'
              }
          },
          yAxis: {
              title: {
                  text: 'Time Spent'
              },
              min: 0
          },
          tooltip: {
              headerFormat: '<b>{series.name}</b><br>',
              pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
          },

          plotOptions: {
              spline: {
                  marker: {
                      enabled: true
                  }
              }
          },

          series: [{
              name: 'Profile Time Spent',
              data: [
              @if(count($data['profile_view_group_by'] )!=0)
              @foreach($data['profile_view_group_by'] as $value)
                  @php
                    $dateString = strtotime($value->created_at);
                    $date = date("Y, j , m" ,$dateString);
                  @endphp
                  [Date.UTC({{$date}}), {{$value->time}}],

              @endforeach
              @endif
              ]
          }, {
              name: 'Project Time Spent',
              data: [
              @if(count($data['project_view_group_by'] )!=0)
              @foreach($data['project_view_group_by'] as $value)
                @php
                  $dateString = strtotime($value->created_at);
                  $date = date("Y, j , m" ,$dateString);
                @endphp
                [Date.UTC({{$date}}), {{$value->time}}],

              @endforeach
              @endif
              ]
          }]
      });
  });
  </script>
  @endif

  @if(Request::segment(1) == 'contact-analytics')
  <script type="text/javascript">
  $(function () {
      $('#container').highcharts({
          chart: {
              type: 'column'
          },
          title: {
              text: 'Report'
          },
          subtitle: {
              // text: 'Source: WorldClimate.com'
          },
          xAxis: {
              categories: [
                  // 'Jan',
                  // 'Feb',
                  // 'Mar',
                  // 'Apr',
                  // 'May',
                  // 'Jun',
                  // 'Jul',
                  // 'Aug',
                  // 'Sep',
                  // 'Oct',
                  // 'Nov',
                  // 'Dec'
              ],
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  // text: 'Rainfall (mm)'
              }Pr
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'Contact',
              data: [
                    @foreach($data['email_group_by'] as $egb)
                      {{$egb->count}},
                    @endforeach
                    ]

          }, {
              name: 'Email',
              data: [
                    @foreach($data['contact_group_by'] as $cgb)
                      {{$cgb->count}},
                    @endforeach
              ]

          }]
      });
  });

  $(function () {
      $('#container-graph').highcharts({
          chart: {
              type: 'pie',
              options3d: {
                  enabled: true,
                  alpha: 45,
                  beta: 0
              }
          },
          title: {
              text: 'Pie View'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  depth: 35,
                  dataLabels: {
                      enabled: true,
                      format: '{point.name}'
                  }
              }
          },
          series: [{
              type: 'pie',
              name: 'Report',
              data: [
                  ['Contact', {{(count($data['email']))}}/{{(count($data['contact']))+(count($data['email']))}}*100],
                  ['Email', {{(count($data['contact']))}}/{{(count($data['contact']))+(count($data['email']))}}*100 ],
                  
              ]
          }]
      });
  });
  </script>
@endif

@endif


@if(Request::segment(1) == 'profile' && !empty($vendor->id))
<script type="text/javascript">
  TimeMe.setIdleDurationInSeconds(15);
  TimeMe.setCurrentPageName("vendor-profile");
  TimeMe.initialize();
  window.onload = function(){
    setInterval(function(){
      var timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();

      xmlhttp=new XMLHttpRequest();
      xmlhttp.open("POST","{{url('pro/ajax/timeSpentProfile')}}",true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("time="+timeSpentOnPage.toFixed(2)+"&vendor_id="+"{{$vendor->id}}&_token="+csrf);

    }, 4000);
  }    
</script>
@endif