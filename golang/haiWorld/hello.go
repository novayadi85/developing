package main

import "fmt"
import "reflect"

//demo "../haiWorld/lib/demo"

var node = 200
var golang, angular bool
var result string

func main() {
	show(5)
	//var apples = "2 Apples"
	//var oranges = "5 Oranges"
	//var fruit = apples + " " + oranges
	//fmt.Println(fruit)
}

func show(args int) {
	//var x int
	//node = node + args
	//fmt.Println(x, node, golang, angular)
	//demo.Test()
	//demo.Basic()
	//var b = new(classes.Person)
	//fmt.Println(b.GetPersonName('a'))
	tesmode()
}

func tesmode() {
	var apples = "Indonesia"
	//fmt.Println(len(apples))
	for i := 0; i <= len(apples); i++ {
		x := len(apples) - i
		y := x + 1
		if y <= len(apples) {
			result += apples[x:y]
		}
		//fmt.Println(x, y)
	}

	fmt.Printf("Hasilnya adalah dari %s menjadi %s \n", apples, result)
	fmt.Println(reflect.TypeOf(result))
	typedata := typeof(result)
	//typedata := reflect.TypeOf(result) string
	if typedata == "string" {
		fmt.Printf("Type variable %s adalah %s", result, reflect.TypeOf(result))
	}
}

func typeof(v interface{}) string {
	switch t := v.(type) {
	case string:
		return "string"
	case int:
		return "int"
	case float64:
		return "float64"
	//... etc
	default:
		_ = t
		return "unknown"
	}
}
