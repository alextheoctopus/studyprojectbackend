window.onload = () => {
    var entryDiv = document.getElementById('EntryForm');
    entryDiv.style.display = 'none';
    var regiDiv = document.getElementById('RegiForm');
    regiDiv.style.display = 'none';
}
const entryMethods = new EntryForm();

var btnToOpenEntryForm = document.getElementById('btnToOpenEntryForm');
btnToOpenEntryForm.addEventListener('click', function() {
    var regiDiv = document.getElementById('RegiForm');
    regiDiv.style.display = 'none';
    var entryDiv = document.getElementById('EntryForm');
    entryDiv.style.display = 'block';
});

var btnToOpenRegiForm = document.getElementById('btnToOpenRegiForm');
btnToOpenRegiForm.addEventListener('click', function() {
    var entryDiv = document.getElementById('EntryForm');
    entryDiv.style.display = 'none';
    var regiDiv = document.getElementById('RegiForm');
    regiDiv.style.display = 'block';
});

var btnToSubmitRegi = document.getElementById('btnToSubmitRegi');
btnToSubmitRegi.addEventListener('click', async function() {
    entryMethods.RegiMethod();
    var regiDiv = document.getElementById('RegiForm');
    regiDiv.style.display = 'none';
});

var btnToSubmitEntry = document.getElementById('btnToSubmitEntry');
btnToSubmitEntry.addEventListener('click', async function() {
    entryMethods.EntryMethod();
    var entryDiv = document.getElementById('EntryForm');
    entryDiv.style.display = 'none';
});

const btnToGetRaces = document.getElementById('getRaces').addEventListener('click', async() => {
    const div = document.getElementById('outputRaces');
    div.innerHTML = entryMethods.getRacesMethod();
})