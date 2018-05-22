package main

import (
	"fmt"

	classes "../haiWorld/lib/classes"
	demo "../haiWorld/lib/demo"
)

var node = 200
var golang, angular bool

func main() {
	show(5)
	var apples = "2 Apples"
	var oranges = "5 Oranges"
	var fruit = apples + " " + oranges
	fmt.Println(fruit)
}

func show(args int) {
	var x int
	node = node + args
	fmt.Println(x, node, golang, angular)
	demo.Test()
	demo.Basic()
	var b = new(classes.Person)
	fmt.Println(b.GetPersonName('a'))
}
