<?php get_header(); /*Template Name: Colour Contrast Checker*/ ?>



<section class="page-content colour-contrast-checker">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>Test Colours</h2>
                <p>Enter a foreground and background colour to check whether they meet WCAG's success criteria.</p>
                <br>

                <form id="contrast-checker-form">
                <label for="background-colour">Background Colour: </label>
                  <input type="color" id="background-colour" required>
                  <br>
                  <label for="foreground-colour">Foreground Colour: </label>
                  <input type="color" id="foreground-colour" required>
                  <br>
                  <br>
                  <button type="submit" role="button" class="btn btn-blue">Check Contrast</button>
                </form>
                <br>
                <div id="results"></div>
                
            </div>
            <div class="col-6">
                <div class="card">
                    <?php the_field('contrast_requirements_info'); ?>
                <div>
            </div>
        </div>
    </div>
</section>

<script>

// calculate contrast ratio
function getContrastRatio(colour1, colour2) {
    
    // convert to RGB
    const rgb1 = hexToRgb(colour1);
    const rgb2 = hexToRgb(colour2);

    // calculate luminance
    const luminance1 = calculateLuminance(rgb1);
    const luminance2 = calculateLuminance(rgb2);

    // calculate contrast ratio
    const contrastRatio = (Math.max(luminance1, luminance2) + 0.05) / (Math.min(luminance1, luminance2) + 0.05);
    return contrastRatio.toFixed(2);
}

// convert hex colour to RGB
function hexToRgb(hex) {

    // remove '#' if present
    hex = hex.replace(/^#/, '');

    // convert to RGB
    const r = parseInt(hex.substring(0, 2), 16);
    const g = parseInt(hex.substring(2, 4), 16);
    const b = parseInt(hex.substring(4, 6), 16);

    return [r, g, b];
}

// calculate luminance
function calculateLuminance(rgb) {

    const [r, g, b] = rgb.map(value => {
        // normalize
        value /= 255; 
        return value <= 0.03928 ? value / 12.92 : Math.pow((value + 0.055) / 1.055, 2.4);
    });

    // luminance formula
    return 0.2126 * r + 0.7152 * g + 0.0722 * b; 
}

// determine compliance level for given contrast ratio and text size
function getComplianceLevel(contrastRatio, textSize) {

    if (textSize === 'small') {
        const aaCompliant = contrastRatio >= 4.5;
        const aaaCompliant = contrastRatio >= 7;
        return {
            'AA': aaCompliant ? 'Pass' : 'Fail',
            'AAA': aaaCompliant ? 'Pass' : 'Fail'
        };
    } else if (textSize === 'large') {
        const aaCompliant = contrastRatio >= 3;
        const aaaCompliant = contrastRatio >= 4.5;
        return {
            'AA': aaCompliant ? 'Pass' : 'Fail',
            'AAA': aaaCompliant ? 'Pass' : 'Fail'
        };
    } else if (textSize === 'ui') {
        const aaCompliant = contrastRatio >= 3;
        const aaaCompliant = contrastRatio >= 4.5;
        return {
            'AA': aaCompliant ? 'Pass' : 'Fail',
        };
    }
}

// handle form submission
document.getElementById('contrast-checker-form').addEventListener('submit', function(event) {
    
    // prevent page refresh
    event.preventDefault(); 

    const backgroundcolour = document.getElementById('background-colour').value;
    const foregroundcolour = document.getElementById('foreground-colour').value;

    const contrastRatio = getContrastRatio(foregroundcolour, backgroundcolour);

    // display results
    const resultsElement = document.getElementById('results');
    resultsElement.innerHTML = `<p>Contrast Ratio: <strong>${contrastRatio}</strong></p><br>`;

    // check against WCAG standards for small text
    const smallTextCompliance = getComplianceLevel(contrastRatio, 'small');
    resultsElement.innerHTML += `<h3>Small Text:</h3>`;
    resultsElement.innerHTML += `<p>AA: <strong>${smallTextCompliance['AA']}</strong></p>`;
    resultsElement.innerHTML += `<p>AAA: <strong>${smallTextCompliance['AAA']}</strong></p><br>`;

    // check against WCAG standards for large text
    const largeTextCompliance = getComplianceLevel(contrastRatio, 'large');
    resultsElement.innerHTML += `<h3>Large Text:</h3>`;
    resultsElement.innerHTML += `<p>AA: <strong>${largeTextCompliance['AA']}</strong></p>`;
    resultsElement.innerHTML += `<p>AAA: <strong>${largeTextCompliance['AAA']}</strong></p><br>`;

    // check against WCAG standards for UI components
    const uiCompliance = getComplianceLevel(contrastRatio, 'ui');
    resultsElement.innerHTML += `<h3>UI Components:</h3>`;
    resultsElement.innerHTML += `<p>AA: <strong>${uiCompliance['AA']}</strong></p>`;
});

</script>



<?php get_footer();?>