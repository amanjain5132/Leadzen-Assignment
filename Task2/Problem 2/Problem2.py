##The head of the linked list contains an unique integer, while nums is a subset on linked list values. The output needs to be a number of connected components in nums where two values are connected if they appear consecutively in the linked list

def numComponents(self, head: ListNode, nums: List[int]) -> int:
        d = set(nums)
        count = 0
        c = 0
        temp = head
        while temp:
            if temp.val in d:
                c=1
            else:
                count+=c
                c=0
            temp= temp.next
        return count+c
