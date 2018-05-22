package Hello

type Person struct {
	Name string
}

func (h *Person) GetPersonName() string {
	return h.Name
}
