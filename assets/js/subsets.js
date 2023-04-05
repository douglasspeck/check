function createSubset(subset, id){
    
    let figures = JSON.parse(subset.getAttribute('figures'));
    
    let parentSet = subset.parentElement;
    let parentSetId = parentSet.getAttribute('id');
    let parentSetWidth = parseInt(parentSet.getAttribute('width'));
    let parentSetHeight = parseInt(parentSet.getAttribute('height'));
    
    let size = parentSetWidth < parentSetHeight ? parentSetWidth : parentSetHeight;
    
    let center = {x: parentSetWidth/2, y: parentSetHeight/2};
    
    let circles = [];
    
    for (let i = 0; i < figures.circles; i++) {
        
        let c = {
            x: Math.random() * size/2 + size/4,
            y: Math.random() * size/2 + size/4
        };
        
        c.deg = Math.atan2(c.y - center.y, c.x - center.x);
        circles.push(c);
        
    }
    
    // Calculate the convex hull of the circles using Graham's scan algorithm
    let hull = [];
    let top = 0;
    
    // Find the point with the lowest y-coordinate (ties broken by lowest x-coordinate)
    for (let i = 0; i < circles.length; i++) {
        if (circles[i].y < circles[top].y || (circles[i].y === circles[top].y && circles[i].x < circles[top].x)) {
            top = i;
        }
    }
    
    hull.push({x: circles[top].x, y: circles[top].y});
    
    // Sort the points by polar angle around the lowest point
    circles.sort((a, b) => Math.atan2(a.y - circles[top].y, a.x - circles[top].x) - Math.atan2(b.y - circles[top].y, b.x - circles[top].x));
    
    function cross(a, b, c) {
        return (b.x - a.x) * (c.y - a.y) - (b.y - a.y) * (c.x - a.x);
    }
    
    for (let i = 0; i < circles.length; i++) {
        // Remove any points that would make the hull concave
        while (hull.length > 1 && cross(hull[hull.length - 2], hull[hull.length - 1], circles[i]) <= 0) {
            hull.pop();
        }
        hull.push({x: circles[i].x, y: circles[i].y});
    }
    
    // Calculate the centroid of the hull
    var cx = 0, cy = 0;
    for (var i = 0; i < hull.length; i++) {
        cx += hull[i].x;
        cy += hull[i].y;
    }
    cx /= hull.length;
    cy /= hull.length;

    // Sort the hull vertices counterclockwise around the centroid
    hull.sort(function(a, b) {
        return angle(cx, cy, a.x, a.y) - angle(cx, cy, b.x, b.y);
    });

    // Generate all possible subsets of the hull vertices
    var subsets = [];
    for (var i = 1; i < hull.length; i++) {
        var s = [];
        for (var j = i; j < hull.length; j++) {
            s.push(hull[j]);
            subsets.push(s.slice());
        }
    }

    // Sort the subsets by length
    subsets.sort(function(a, b) {
    return a.length - b.length;
    });

    // Generate a path for each subset
    var paths = [];
    for (var i = 0; i < subsets.length; i++) {
        var subset = subsets[i];
        var path = [subset[0]];
        for (var j = 1; j < subset.length; j++) {
            var p = subset[j];
            var inserted = false;
            for (var k = 0; k < path.length - 1; k++) {
                if (distToSegmentSquared(p, path[k], path[k + 1]) < 1) {
                    path.splice(k + 1, 0, p);
                    inserted = true;
                    break;
                }
            }
            if (!inserted) {
                path.push(p);
            }
        }
        paths.push(path);
    }

    // Generate paths for all subsets of the points on the left side of the line
    let leftSubsets = generateSubsets(leftPoints);
    for (let subset of leftSubsets) {
    // Add the rightmost point of the subset to the hull
    let rightmost = getRightmostPoint(subset);
    hull.push(rightmost);

    // Recursively calculate the convex hull of the subset
    let subsetHull = calculateConvexHull(subset);

    // Add the subset hull to the paths
    paths.push(subsetHull);

    // Remove the rightmost point from the hull
    hull.pop();
    }

    // Generate paths for all subsets of the points on the right side of the line
    let rightSubsets = generateSubsets(rightPoints);
    for (let subset of rightSubsets) {
    // Add the leftmost point of the subset to the hull
    let leftmost = getLeftmostPoint(subset);
    hull.push(leftmost);

    // Recursively calculate the convex hull of the subset
    let subsetHull = calculateConvexHull(subset);

    // Add the subset hull to the paths
    paths.push(subsetHull);

    // Remove the leftmost point from the hull
    hull.pop();
    }

    // Return the paths
    return paths;

}