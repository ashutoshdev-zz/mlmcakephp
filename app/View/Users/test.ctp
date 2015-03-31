<div class='liveExample'> 

    <h2>Planets</h2>
    <p> 
        <label>
            <input type='checkbox' data-bind='checked: displayAdvancedOptions' />
            Display advanced options
        </label>
    </p>

    <p data-bind='fadeVisible: displayAdvancedOptions'>
        Show:
        <label><input type='radio' name="type" value='all' data-bind='checked: typeToShow' />All</label>
        <label><input type='radio' name="type" value='rock' data-bind='checked: typeToShow' />Rocky planets</label>
        <label><input type='radio' name="type" value='gasgiant' data-bind='checked: typeToShow' />Gas giants</label>
    </p>

    <div data-bind='template: { foreach: planetsToShow,
                                beforeRemove: hidePlanetElement,
                                afterAdd: showPlanetElement }'>
        <div data-bind='attr: { "class": "planet " + type }, text: name'> </div>
    </div>

    <p data-bind='fadeVisible: displayAdvancedOptions'>
        <button data-bind='click: addPlanet.bind($data, "rock")'>Add rocky planet</button>
        <button data-bind='click: addPlanet.bind($data, "gasgiant")'>Add gas giant</button>
    </p>

</div>
<style type="text/css">

    .liveExample { padding: 1em; background-color: #EEEEDD; border: 1px solid #CCC; max-width: 655px; }
    .liveExample input { font-family: Arial; }
    .liveExample b { font-weight: bold; }
    .liveExample p { margin-top: 0.9em; margin-bottom: 0.9em; }
    .liveExample select[multiple] { width: 100%; height: 8em; }
    .liveExample h2 { margin-top: 0.4em; }

    .planet { background-color: #AAEECC; padding: 0.25em; border: 1px solid silver; margin-bottom: 0.5em; font-size: 0.75em; }
    .planet.rock { background-color: #EECCAA; }
    .liveExample input { margin: 0 0.3em 0 1em; }

    li { list-style-type: disc; margin-left: 20px; }

</style>

<script type="text/javascript">
    var PlanetsModel = function() {
        this.planets = ko.observableArray([
            {name: "Mercury", type: "rock"},
            {name: "Venus", type: "rock"},
            {name: "Earth", type: "rock"},
        { name: "Mars", type: "rock"},
        { name: "Jupiter", type: "gasgiant"},
        { name: "Saturn", type: "gasgiant"},
        { name: "Uranus", type: "gasgiant"},
        { name: "Neptune", type: "gasgiant"},
        { name: "Pluto", type: "rock"}
    ]);
 
    this.typeToShow = ko.observable("all");
    this.displayAdvancedOptions = ko.observable(false);
 
    this.addPlanet = function(type) {
        this.planets.push({
            name: "New planet",
            type: type
        });
    };
 
    this.planetsToShow = ko.computed(function() {
        // Represents a filtered list of planets
        // i.e., only those matching the "typeToShow" condition
        var desiredType = this.typeToShow();
        if (desiredType == "all") return this.planets();
        return ko.utils.arrayFilter(this.planets(), function(planet) {
            return planet.type == desiredType;
        });
    }, this);
 
    // Animation callbacks for the planets list
    this.showPlanetElement = function(elem) { if (elem.nodeType === 1) $(elem).hide().slideDown() }
    this.hidePlanetElement = function(elem) { if (elem.nodeType === 1) $(elem).slideUp(function() { $(elem).remove(); }) }
};
 
// Here's a custom Knockout binding that makes elements shown/hidden via jQuery's fadeIn()/fadeOut() methods
// Could be stored in a separate utility library
ko.bindingHandlers.fadeVisible = {
    init: function(element, valueAccessor) {
        // Initially set the element to be instantly visible/hidden depending on the value
        var value = valueAccessor();
        $(element).toggle(ko.utils.unwrapObservable(value)); // Use "unwrapObservable" so we can handle values that may or may not be observable
    },
    update: function(element, valueAccessor) {
        // Whenever the value subsequently changes, slowly fade the element in or out
        var value = valueAccessor();
        ko.utils.unwrapObservable(value) ? $(element).fadeIn() : $(element).fadeOut();
    }
};
 
ko.applyBindings(new PlanetsModel());


</script>