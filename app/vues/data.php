<div class="widget-indicateur">
    <div class="entete-indicateur">
        <span class="icone-indicateur">🌡️</span>
    </div>
    <p class="etiquette-indicateur">Température</p>
    <p class="valeur-indicateur"><?= $latestData['temperature'] ?>°C</p>
    <div class="min-max">
        <div class="min">
            <small>Min</small>
            <p><?= $tempStats['min'] ?>°C</p>
        </div>
        <div class="max">
            <small>Max</small>
            <p><?= $tempStats['max'] ?>°C</p>
        </div>
    </div>
</div>

<div class="widget-indicateur">
    <div class="entete-indicateur">
        <span class="icone-indicateur">💧</span>
    </div>
    <p class="etiquette-indicateur">Humidité</p>
    <p class="valeur-indicateur"><?= $latestData['humidite'] ?>%</p>
    <div class="min-max">
        <div class="min">
            <small>Min</small>
            <p><?= $humStats['min'] ?>%</p>
        </div>
        <div class="max">
            <small>Max</small>
            <p><?= $humStats['max'] ?>%</p>
        </div>
    </div>
</div>

<div class="widget-indicateur">
    <div class="entete-indicateur">
        <span class="icone-indicateur">⚖️</span>
    </div>
    <p class="etiquette-indicateur">Poids total</p>
    <p class="valeur-indicateur"><?= $latestData['poids'] ?> kg</p>
    <div class="min-max">
        <div class="min">
            <small>Min</small>
            <p><?= $poidsStats['min'] ?> kg</p>
        </div>
        <div class="max">
            <small>Max</small>
            <p><?= $poidsStats['max'] ?> kg</p>
        </div>
    </div>
</div>

<div class="widget-indicateur">
    <div class="entete-indicateur">
        <span class="icone-indicateur">〰️</span>
    </div>
    <p class="etiquette-indicateur">Fréquence</p>
    <p class="valeur-indicateur"><?= $latestData['frequence'] ?> Hz</p>
    <div class="min-max">
        <div class="min">
            <small>Min</small>
            <p><?= $freqStats['min'] ?> Hz</p>
        </div>
        <div class="max">
            <small>Max</small>
            <p><?= $freqStats['max'] ?> Hz</p>
        </div>
    </div>
</div>