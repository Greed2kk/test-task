<?php
function getLen($array)
{
    usort($array, function ($a, $b)
    {
        return ($a > $b) ? +1 : -1;
    });
	
    $mergedArray = [$array[0]];
    $sortedArray = array_slice($array, 1);
    foreach ($sortedArray as $item)
    {
        $lastItem = $mergedArray[sizeof($mergedArray) - 1];
        if ($item[0] <= $lastItem[1])
        {
            if ($item[1] > $lastItem[1])
            {
                $lastItem[1] = $item[1];
            }
        }
        else
        {
            array_push($mergedArray, $item);
        }

    }

    return array_reduce($mergedArray, function ($memo, $item)
    {
        return ($item[1] - $item[0]) + memo;
    }, 1);
}

getLen([ [1, 10], [7, 10], [3, 5], [1, 10]]);

?>