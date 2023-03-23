<?php

namespace ukf;

class Menu
{
    private $sourceFileName = "source/headerMenuCSV.csv";

    public function getMenuData(string $type): array
    {
        $menu = [];

        if ($this->validateMenuType($type)) {
            if ($type === "header") {
                try {
                    $file = fopen($this->FileName, 'r');
                    while (($data = fgetcsv($file, 1000,',' )) != False) {
                        $menu[] = $data;
                    }
                    fclose($file);
                } catch (\Exception $exception) {
                }
            }
        }

        return $menu;
    }

    public function printMenu(array $menu)
    {
        foreach ($menu as $item => $i) {
            echo '<li><a href="' . $i[0] . '">' . $i[1] . '</a></li>';
        }
    }

    private function validateMenuType(string $type): bool
    {
        $menuTypes = [
            'header',
            'footer'
        ];

        if (in_array($type, $menuTypes)) {
            return true;
        } else {
            return false;
        }
    }


    public function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array
    {
        $portfolio = [];
        $colIndex = 1;

        for ($i = 1; $i <= $numberOfRows; $i++) {
            for ($j = 1; $j <= $numberOfCols; $j++) {
                $portfolio[$i][] = $colIndex;
                $colIndex++;
            }
        }

        return $portfolio;
    }
}


?>
